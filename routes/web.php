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

});
