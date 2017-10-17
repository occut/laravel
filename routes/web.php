<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Home'], function () {
    //登录
    Route::get('/','IndexController@index')->name("index");
});
//报错
Route::get('Error','ErrorController@index')->name("Error");
//登录
Route::resource('Admin/login'
    ,'Admin\LoginController'
    ,array('names'
    =>array('create' => 'login.create'
        ,'index'=>'login.index'
        ,'store'=>'login.store'
        ,'edit'=>'login.edit'
        ,'update'=>'login.update'
        ,'destroy'=>'login.delete',
        )
    )
);
Route::group(['middleware' => ['CheckAge'],'namespace' => 'Admin'], function () {
    //后台首页
    Route::resource('Admin/index'
                ,'IndexController'
                ,array('names'
        =>array('create' => 'index.create'
            ,'index'=>'index.index'
            ,'store'=>'index.store'
            ,'show'=>'index.show'
            ,'edit'=>'index.edit'
            ,'update'=>'index.update'
            ,'destroy'=>'index.delete',
            )
        )
    );
    //用户界面
    Route::resource('Admin/Administrators'
                    ,'AdministratorsController'
                    ,array('names'
        =>array('create' => 'Administrators.create'
            ,'index'=>'Administrators.index'//用户首页
            ,'store'=>'Administrators.store'//添加用户
            ,'edit'=>'Administrators.edit'//编辑用户
            ,'update'=>'Administrators.update'//更新权限
            ,'destroy'=>'Administrators.delete'//删除用户
            )
        ));
    Route::any('Admin/Administrators/weight/{id?}','AdministratorsController@weight')->name("Administrators/weight");
    //角色管理
    Route::resource('Admin/AdminRole'
        ,'AdminRoleController'
        ,array('names'
        =>array('create' => 'AdminRole.create'
            ,'index'=>'AdminRole.index'
            ,'store'=>'AdminRole.store'
            ,'edit'=>'AdminRole.edit'
            ,'update'=>'AdminRole.update'
            ,'destroy'=>'AdminRole.delete',
            )
        ));
    //Weight
    Route::any('Admin/AdminRole/Weight/{id?}','AdminRoleController@Weight')->name("AdminRole/weight");
    //模板管理
    Route::resource('Admin/AdminNodes'
        ,'AdminNodesController'
        ,array('names'
        =>array('create' => 'AdminNodes.create'
            ,'index'=>'AdminNodes.index'
            ,'store'=>'AdminNodes.store'
            ,'edit'=>'AdminNodes.edit'
            ,'update'=>'AdminNodes.update'
            ,'destroy'=>'AdminNodes.delete',
            )
        ));
    //设置之网站信息
    Route::resource('Admin/WebSettings'
        ,'WebSettingsController'
        ,array('names'
        =>array('create' => 'WebSettings.create'
            ,'index'=>'WebSettings.index'
            ,'store'=>'WebSettings.store'
            ,'edit'=>'WebSettings.edit'
            ,'update'=>'WebSettings.update'
            ,'destroy'=>'WebSettings.delete',
            )
        ));

    Route::any('Admin/WebSettings/Webup','WebSettingsController@Webup')->name("WebSettings/weight");
    //设置之个人信息
    Route::resource('Admin/Profile'
        ,'ProfileController'
        ,array('names'
        =>array('create' => 'Profile.create'
            ,'index'=>'Profile.index'
            ,'store'=>'Profile.store'
            ,'edit'=>'Profile.edit'
            ,'update'=>'Profile.update'
            ,'destroy'=>'Profile.delete',
            )
        ));

    //游戏管理之游戏管理
    Route::any('Admin/Game/isOn/{id?}','GameController@isOn')->name("Game.isOn");
    Route::any('Admin/Game/search','GameController@search')->name("Game.search");
    Route::any('Admin/Game/orderBy','GameController@orderBy')->name("Game.orderBy");
    Route::resource('Admin/Game'
        ,'GameController'
        ,array('names'
        =>array('create' => 'Game.create'
            ,'index'=>'Game.index'
            ,'store'=>'Game.store'
            ,'edit'=>'Game.edit'
            ,'update'=>'Game.update'
            ,'destroy'=>'Game.delete',
            )
        ));

    //游戏管理之区服管理
    Route::resource('Admin/Area'
        ,'AreaController'
        ,array('names'
        =>array('create' => 'Area.create'
            ,'index'=>'Area.index'
            ,'store'=>'Area.store'
            ,'edit'=>'Area.edit'
            ,'update'=>'Area.update'
            ,'destroy'=>'Area.delete',
            )
        ));
    //游戏管理之卡类管理
    Route::resource('Admin/Card'
        ,'CardController'
        ,array('names'
        =>array('create' => 'Card.create'
            ,'index'=>'Card.index'
            ,'store'=>'Card.store'
            ,'edit'=>'Card.edit'
            ,'update'=>'Card.update'
            ,'destroy'=>'Card.delete',
            )
        ));

    //游戏管理之活动管理
    Route::any('Admin/Activity/isOn/{id?}','ActivityController@isOn')->name("Activity.isOn");
    Route::any('Admin/Activity/search','ActivityController@search')->name("Activity.search");
    Route::resource('Admin/Activity'
        ,'ActivityController'
        ,array('names'
        =>array('create' => 'Activity.create'
            ,'index'=>'Activity.index'
            ,'store'=>'Activity.store'
            ,'edit'=>'Activity.edit'
            ,'update'=>'Activity.update'
            ,'destroy'=>'Activity.delete',
            )
        ));

    //游戏管理之分类管理
    Route::resource('Admin/Category'
        ,'CategoryController'
        ,array('names'
        =>array('create' => 'Category.create'
            ,'index'=>'Category.index'
            ,'store'=>'Category.store'
            ,'edit'=>'Category.edit'
            ,'update'=>'Category.update'
            ,'destroy'=>'Category.delete',
            )
        ));
//统计管理之游戏概况
    Route::resource('Admin/GameIntro'
        ,'GameIntroController'
        ,array('names'
        =>array('create' => 'GameIntro.create'
            ,'index'=>'GameIntro.index'
            ,'store'=>'GameIntro.store'
            ,'edit'=>'GameIntro.edit'
            ,'update'=>'GameIntro.update'
            ,'destroy'=>'GameIntro.delete',
            )
        ));
    //统计管理之用户登出
    Route::resource('Admin/UserLogout'
        ,'UserLogoutController'
        ,array('names'
        =>array('create' => 'UserLogout.create'
            ,'index'=>'UserLogout.index'
            ,'store'=>'UserLogout.store'
            ,'edit'=>'UserLogout.edit'
            ,'update'=>'UserLogout.update'
            ,'destroy'=>'UserLogout.delete',
            )
        ));

    //统计管理之报表统计
    Route::resource('Admin/Report'
        ,'ReportController'
        ,array('names'
        =>array('create' => 'Report.create'
            ,'index'=>'Report.index'
            ,'store'=>'Report.store'
            ,'edit'=>'Report.edit'
            ,'update'=>'Report.update'
            ,'destroy'=>'Report.delete',
            )
        ));

    //统计管理之用户注册
    Route::resource('Admin/UserReg'
        ,'UserRegController'
        ,array('names'
        =>array('create' => 'UserReg.create'
            ,'index'=>'UserReg.index'
            ,'store'=>'UserReg.store'
            ,'edit'=>'UserReg.edit'
            ,'update'=>'UserReg.update'
            ,'destroy'=>'UserReg.delete',
            )
        ));

    //统计管理之渠道分析
    Route::resource('Admin/Way'
        ,'WayController'
        ,array('names'
        =>array('create' => 'Way.create'
            ,'index'=>'Way.index'
            ,'store'=>'Way.store'
            ,'edit'=>'Way.edit'
            ,'update'=>'Way.update'
            ,'destroy'=>'Way.delete',
            )
        ));

    //统计管理之账户管理
    Route::resource('Admin/Account'
        ,'AccountController'
        ,array('names'
        =>array('create' => 'Account.create'
            ,'index'=>'Account.index'
            ,'store'=>'Account.store'
            ,'edit'=>'Account.edit'
            ,'update'=>'Account.update'
            ,'destroy'=>'Account.delete',
            )
        ));

    //统计管理之用户登录
    Route::resource('Admin/UserLogin'
        ,'UserLoginController'
        ,array('names'
        =>array('create' => 'UserLogin.create'
            ,'index'=>'UserLogin.index'
            ,'store'=>'UserLogin.store'
            ,'edit'=>'UserLogin.edit'
            ,'update'=>'UserLogin.update'
            ,'destroy'=>'UserLogin.delete',
            )
        ));

    //统计管理之用户充值
    Route::resource('Admin/UserCoin'
        ,'UserCoinController'
        ,array('names'
        =>array('create' => 'UserCoin.create'
            ,'index'=>'UserCoin.index'
            ,'store'=>'UserCoin.store'
            ,'edit'=>'UserCoin.edit'
            ,'update'=>'UserCoin.update'
            ,'destroy'=>'UserCoin.delete',
            )
        ));

    //统计管理之游戏充值
    Route::resource('Admin/GameCoin'
        ,'GameCoinController'
        ,array('names'
        =>array('create' => 'GameCoin.create'
            ,'index'=>'GameCoin.index'
            ,'store'=>'GameCoin.store'
            ,'edit'=>'GameCoin.edit'
            ,'update'=>'GameCoin.update'
            ,'destroy'=>'GameCoin.delete',
            )
        ));
    //统计管理之渠道充值
    Route::resource('Admin/WayCoin'
        ,'WayCoinController'
        ,array('names'
        =>array('create' => 'WayCoin.create'
            ,'index'=>'WayCoin.index'
            ,'store'=>'WayCoin.store'
            ,'edit'=>'WayCoin.edit'
            ,'update'=>'WayCoin.update'
            ,'destroy'=>'WayCoin.delete',
            )
        ));

    //推广管理之推广员管理
    Route::resource('Admin/Promoter'
        ,'PromoterController'
        ,array('names'
        =>array('create' => 'Promoter.create'
            ,'index'=>'Promoter.index'
            ,'store'=>'Promoter.store'
            ,'edit'=>'Promoter.edit'
            ,'update'=>'Promoter.update'
            ,'show'=>'Promoter.show'
            ,'destroy'=>'Promoter.delete',
            )
        ));

    //推广管理之实时注册
    Route::resource('Admin/Register'
        ,'RegisterController'
        ,array('names'
        =>array('create' => 'Register.create'
            ,'index'=>'Register.index'
            ,'store'=>'Register.store'
            ,'edit'=>'Register.edit'
            ,'update'=>'Register.update'
            ,'destroy'=>'Register.delete',
            )
        ));

    //推广管理之实时充值
    Route::resource('Admin/Recharge'
        ,'RechargeController'
        ,array('names'
        =>array('create' => 'Recharge.create'
            ,'index'=>'Recharge.index'
            ,'store'=>'Recharge.store'
            ,'edit'=>'Recharge.edit'
            ,'update'=>'Recharge.update'
            ,'destroy'=>'Recharge.delete',
            )
        ));
    //推广管理之结算管理
    Route::resource('Admin/JieSuan'
        ,'JieSuanController'
        ,array('names'
        =>array('create' => 'JieSuan.create'
            ,'index'=>'JieSuan.index'
            ,'store'=>'JieSuan.store'
            ,'edit'=>'JieSuan.edit'
            ,'update'=>'JieSuan.update'
            ,'destroy'=>'JieSuan.delete',
            )
        ));

    //推广管理之分成比例
    Route::resource('Admin/FenCheng'
        ,'FenChengController'
        ,array('names'
        =>array('create' => 'FenCheng.create'
            ,'index'=>'FenCheng.index'
            ,'store'=>'FenCheng.store'
            ,'edit'=>'FenCheng.edit'
            ,'update'=>'FenCheng.update'
            ,'destroy'=>'FenCheng.delete',
            )
        ));

    //推广管理之分成比例
    Route::resource('Admin/TiXian'
        ,'TiXianController'
        ,array('names'
        =>array('create' => 'TiXian.create'
            ,'index'=>'TiXian.index'
            ,'store'=>'TiXian.store'
            ,'edit'=>'TiXian.edit'
            ,'update'=>'TiXian.update'
            ,'destroy'=>'TiXian.delete',
            )
        ));
    //推广管理之IOS申请
    Route::resource('Admin/IOSApplication'
        ,'IOSApplicationController'
        ,array('names'
        =>array('create' => 'IOSApplication.create'
            ,'index'=>'IOSApplication.index'
            ,'store'=>'IOSApplication.store'
            ,'edit'=>'IOSApplication.edit'
            ,'update'=>'IOSApplication.update'
            ,'destroy'=>'IOSApplication.delete',
            )
        ));

    //推广管理之排行榜
    Route::any('Admin/Rank/seven','RankController@seven')->name("Rank.seven");
    Route::any('Admin/Rank/one','RankController@one')->name("Rank.one");
    Route::resource('Admin/Rank'
        ,'RankController'
        ,array('names'
        =>array('create' => 'Rank.create'
            ,'index'=>'Rank.index'
            ,'store'=>'Rank.store'
            ,'edit'=>'Rank.edit'
            ,'update'=>'Rank.update'
            ,'destroy'=>'Rank.delete',
            )
        ));


    //商品管理之商品管理
    Route::resource('Admin/Product'
        ,'ProductController'
        ,array('names'
        =>array('create' => 'Product.create'
            ,'index'=>'Product.index'
            ,'store'=>'Product.store'
            ,'edit'=>'Product.edit'
            ,'update'=>'Product.update'
            ,'destroy'=>'Product.delete',
            )
        ));

    //商品管理之订单管理
    Route::resource('Admin/Order'
        ,'OrderController'
        ,array('names'
        =>array('create' => 'Order.create'
            ,'index'=>'Order.index'
            ,'store'=>'Order.store'
            ,'edit'=>'Order.edit'
            ,'update'=>'Order.update'
            ,'destroy'=>'Order.delete',
            )
        ));
    //商品管理之积分管理
    Route::resource('Admin/Points'
        ,'PointsController'
        ,array('names'
        =>array('create' => 'Points.create'
            ,'index'=>'Points.index'
            ,'store'=>'Points.store'
            ,'edit'=>'Points.edit'
            ,'update'=>'Points.update'
            ,'destroy'=>'Points.delete',
            )
        ));
    //商品管理之抽奖管理
    Route::resource('Admin/Prize'
        ,'PrizeController'
        ,array('names'
        =>array('create' => 'Prize.create'
            ,'index'=>'Prize.index'
            ,'store'=>'Prize.store'
            ,'edit'=>'Prize.edit'
            ,'update'=>'Prize.update'
            ,'destroy'=>'Prize.delete',
            )
        ));
    //商品管理之抽奖记录
    Route::resource('Admin/PrizeDetails'
        ,'PrizeDetailsController'
        ,array('names'
        =>array('create' => 'PrizeDetails.create'
            ,'index'=>'PrizeDetails.index'
            ,'store'=>'PrizeDetails.store'
            ,'edit'=>'PrizeDetails.edit'
            ,'update'=>'PrizeDetails.update'
            ,'destroy'=>'PrizeDetails.delete',
            )
        ));

    //商品管理之任务记录
    Route::resource('Admin/TasksDetails'
        ,'TasksDetailsController'
        ,array('names'
        =>array('create' => 'TasksDetails.create'
            ,'index'=>'TasksDetails.index'
            ,'store'=>'TasksDetails.store'
            ,'edit'=>'TasksDetails.edit'
            ,'update'=>'TasksDetails.update'
            ,'destroy'=>'TasksDetails.delete',
            )
        ));
});
