## 業務聯絡名錄（測驗成果展示）

### 資料庫設計
1. Models（資料實體）
    - PK均為各表id
    - Users（公司員工與主管）
        - 欄位包括名稱（name)、職務類型（auth_level，即權限）、email、密碼
    - Fields（所屬業務領域)
        - 欄位包括名稱（name）
    - Companis（業務對象公司)
        - 名稱（name）、email、聯絡人（contact_person）、公司網站（site）
    
1. 關聯資料表
    - contact_lists（聯絡清單）
        - 由上述三個資料表各自id（user_id、field_id、company_id）組成，欲利用inner join及where exist等方式獲取相關資料 `未完成`
        - 多對多關係，使用belongsToMany相互關聯

1. 實體關係
    - field（所屬業務領域） has users（員工）, companies（業務公司）. 


#### __程式沿用性__
1. 以關聯資料表取得既有資料或建立新資料，避免直接操作各實體資料表，以減少後續修改機會
2. 由於模型較小，職務類型不另外做表，提升效率並節省空間
* * *
### Route與權限設計
1. 使用者權限
    - 登入的使用者又分為職員（staff）與主管（manager），Users Model中定義權限（auth_level）依序為 _(int)1_ 和 _(int)2_
        - 網站管理者（admin）權限為 _(int)999_ 
    - 於ServiceProvider中利用Gate物件分別定義，以用於Route與Controller中需要權限的部分
        - Controllers中對於主管和一般職員的區分為 __auth_level__ 值的區間與大小，目的在於使權限較高者能同時使用權限較低者的路徑
            - 職員權限 => user->auth_level >= 1 
            - 主管權限 => user->auth_level >= 2 
            - 網站管理者 => user->auth_level === 999
        例如：
        ```
         Gate::define('admin', function ($user) {
            return $user->auth_level > 2;
        });
        ```
    - 於所有Route加入Laravel的Auth中介，確保使用者均以登入狀態取得API資料
        例如：
        ```
        Auth::routes();
        ```
    - 權限區分
        - Blade `未完成`
            - 自用@can差異不同權限使用者的Views，職員僅有 __新增公司__ 一選項，主管則另有 __管理職員__ 頁面以管理同領域職員，網站管理者多一個 __帳號管理__ 頁面 
            例如：
            ```
            @can('manager')
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/staff')}}" role="button">管理職員</a>
                </li>
            @endcan
            ```
         - Route
            - 若需區分權限（如上述僅主管能取得與增、刪、改職員資料），則於Route中加入middleware('can:權限')，網站管理者、主管包含一般職員的權限
            例如：
            ```
            Route::middleware('can:manager')->resource(
                '/staff',
                ManagerController::class
            );
            ```
         - Controller `未完成`
            - 於建構子中帶入中介層auth，並利用middleware取得使用者相關資料，後續再做判斷
            例如：
            ```
            $this->middleware('auth');
            $this->middleware(function ($request, $next) {
                $this->user = Auth::user();
                return $next($request);
            });
                );
            ```

3. 資料領域權限 `未完成`
    - 預設銷售（sales）、人資（rd）與技術（tech），共三種領域
    - 透過query Builder，利用inner join與whereRelation取得相關資料
    例如：
    ```
    User::whereRelation('fields', 'user_id', $this->user->id);
    ```
    
#### __程式沿用性__
1. 將Auth物件作為user login Request的相關參數之媒介，無須再透過其他方式過濾使用者權限
2. 僅需於建構子中取得使用者資料即可，避免直接修改個方法內的資料實體
3. 由於模型較小，職務類型不另外做表，提升效率並節省空間
* * *
    


