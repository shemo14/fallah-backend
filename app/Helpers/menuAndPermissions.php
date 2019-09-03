<?php

use Illuminate\Support\Facades\Route;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

function menu()
{
    $routes = Route::getRoutes();
    $arr = [];
    $permission = Permission::where('role_id', Auth::user()->role)->select('permissions')->get();
    foreach ($permission as $per) {
        $arr[] = $per->permissions;
    }

    foreach ($routes as $value) {
        if ($value->getName() !== null) {
            if (isset($value->getAction()['title']) && !isset($value->getAction()['front']) && isset($value->getAction()['icon'])) {
                if (isset($value->getAction()['child']) && isset($value->getAction()['subTitle']) && isset($value->getAction()['subIcon'])) {
                    if (in_array($value->getName(), $arr)) {
                        echo '<li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">' . $value->getAction()['icon'] . '<span> ' . $value->getAction()['title'] . ' </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                             ';
                        foreach ($value->getAction()['child'] as $child) {

                            $routes = Route::getRoutes();
                            foreach ($routes as $value) {
                                if ($value->getName() !== null && isset($value->getAction()['icon'])) {
                                    if ($value->getName() == $child) {
                                        if (in_array($value->getName(), $arr)) {
                                            echo '<li><a href="' . route($value->getName()) . '" class="waves-effect">' . $value->getAction()['icon'] . '</i> <span style="font-weight: bolder"> ' . $value->getAction()['title'] . ' </span> </a></li>';
                                        }
                                    }
                                }
                            }
                        }
                        echo '</ul>';
                        echo '</li>';
                    }

                } else if (isset($value->getAction()['child']) && isset($value->getAction()['icon'])) {
                    if (in_array($value->getName(), $arr)) {
                        echo '<li><a href="' . route($value->getName()) . '" class="waves-effect">' . $value->getAction()['icon'] . '</i> <span style="font-weight: bolder"> ' . $value->getAction()['title'] . ' </span> </a></li>';
                    }
                } else if (!isset($value->getAction()['child']) && isset($value->getAction()['icon']) && !isset($value->getAction()['hasFather'])) {
                    $arr = [];
                    $permission = Permission::where('role_id', Auth::user()->role)->select('permissions')->get();
                    foreach ($permission as $key => $per) {
                        $arr[$key] = $per->permissions;
                    }
                    if (in_array($value->getName(), $arr)) {
                        echo '<li><a href="' . route($value->getName()) . '" class="waves-effect">' . $value->getAction()['icon'] . '</i> <span style="font-weight: bolder"> ' . $value->getAction()['title'] . ' </span> </a></li>';
                    }
                }
            }
        }
    }
}

function permissions()
{
    echo '<div class="row">';
    $routes = Route::getRoutes();
    $i = 1;
    foreach ($routes as $value) {
        if ($value->getName() !== null) {
            if (isset($value->getAction()['title']) && !isset($value->getAction()['front']) && isset($value->getAction()['child'])) {
                echo ' <div class="col-sm-3">
                            <div class="panel panel-color panel-inverse">';

                foreach ($value->getAction()['child'] as $child) {
                    if (isset($value->getAction()['title'])) {
                        echo '<div class="panel-heading">
                                 <h3 class="panel-title" style="display: inline-block"> ' . $value->getAction()['title'] . '</h3>
                                 <div style="display: inline-block; position: absolute; left: 20px !important;">
                                    <label class="custom-control material-checkbox">
                                    <input type="checkbox" class="pull-right material-control-input permission check-child checkSingle per_parent" id="' . $i . '" name="permissions[]" value="' . $value->getName() . '"  data-color="rgb(30, 30, 30)" data-child="' . $value->getName() . '"/>
                                        <span class="material-control-indicator header-check"></span>
                                    </label>
                                 </div>
                             </div>
                             <div class="panel-body scroll-body" style="background-color: rgba(211,224,255,0.16);">';
                    }
                    $routes = Route::getRoutes();
                    foreach ($routes as $value) {
                        if ($value->getName() !== null) {
                            if ($value->getName() == $child) {
                                echo '<div class="row">
                                            <div class="col-sm-12">
                                                <h5 style="display: inline-block">  ' . $value->getAction()['title'] . ' </h5>
                                                <div style="display: inline-block; position: absolute; left: 15px !important; top: 8px !important;">
                                                    <label class="custom-control material-checkbox">
                                                    <input type="checkbox" class="pull-right material-control-input permission checkSingle per_' . $i . '" name="permissions[]" value="' . $value->getName() . '" data-size="small" data-color="rgb(30, 30, 30)"/>
                                                        <span class="material-control-indicator"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>';
                            }
                        }
                    }
                }
                echo '</div></div></div>';
            }
            if (!isset($value->getAction()['child']) && isset($value->getAction()['icon']) && !isset($value->getAction()['front']) && isset($value->getAction()['title']) && !isset($value->getAction()['hasFather'])) {
                echo '<div class="col-sm-3">
                            <div class="panel panel-color panel-inverse">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="display: inline-block"> ' . $value->getAction()['title'] . '</h3>
                                    <div style="display: inline-block; position: absolute; left: 20px !important;">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" class="pull-right material-control-input permission check-child checkSingle per_' . $i . '" name="permissions[]" value="' . $value->getName() . '"  data-color="rgb(30, 30, 30)"/>
                                        <span class="material-control-indicator header-check"></span>
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>';
            }
        }
        $i++;
    }
    echo '</div>';
}

function editPermissions($id)
{
    echo '<div class="row">';
    $routes = Route::getRoutes();
    $i = 1;
    foreach ($routes as $value) {
        if ($value->getName() !== null) {
            if (isset($value->getAction()['title']) && !isset($value->getAction()['front']) && isset($value->getAction()['child'])) {

                $arr = [];
                $permission = Permission::where('role_id', $id)->select('permissions')->get();
                foreach ($permission as $key => $per) {
                    $arr[$key] = $per->permissions;
                }

                echo ' <div class="col-sm-3">
                            <div class="panel panel-color panel-inverse">';
                foreach ($value->getAction()['child'] as $child) {

                    if (isset($value->getAction()['title'])) {
                        if (in_array($value->getName(), $arr)) {
                            echo '<div class="panel-heading">
                                 <h3 class="panel-title" style="display: inline-block"> ' . $value->getAction()['title'] . '</h3>
                                 <div style="display: inline-block; position: absolute; left: 20px !important;">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" class="pull-right material-control-input permission checkSingle per_parent" id="' . $i . '" checked name="permissions[]" value="' . $value->getName() . '"  data-color="rgb(30, 30, 30)"/>
                                            <span class="material-control-indicator header-check"></span>
                                        </label>
                                 </div>
                             </div>
                             <div class="panel-body scroll-body" style="background-color: rgba(211,224,255,0.16);">';
                        } else {
                            echo '<div class="panel-heading">
                                 <h3 class="panel-title" style="display: inline-block"> ' . $value->getAction()['title'] . '</h3>
                                 <div style="display: inline-block; position: absolute; left: 20px !important;">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" class="pull-right material-control-input checkSingle per_parent" id="' . $i . '"  name="permissions[]" value="' . $value->getName() . '"  data-color="rgb(30, 30, 30)"/>
                                        <span class="material-control-indicator header-check"></span>
                                    </label>
                                 </div>
                             </div>
                             <div class="panel-body scroll-body" style="background-color: rgba(211,224,255,0.16);">';
                        }
                    }
                    #foreach for sub links
                    $routes = Route::getRoutes();
                    foreach ($routes as $value) {
                        if ($value->getName() !== null && !isset($value->getAction()['icon']) || isset($value->getAction()['hasFather'])) {
                            if ($value->getName() == $child) {
                                if (in_array($value->getName(), $arr)) {
                                    echo '<div class="row">
                                            <div class="col-sm-12">
                                                <h5 style="display: inline-block">  ' . $value->getAction()['title'] . ' </h5>
                                                <div style="display: inline-block; position: absolute; left: 15px !important; top: 8px !important;">
                                                <label class="custom-control material-checkbox">
                                                    <input type="checkbox" class="pull-right material-control-input checkSingle per_' . $i . '" checked name="permissions[]" value="' . $value->getName() . '" data-size="small" data-color="rgb(12, 105, 140)"/>
                                                    <span class="material-control-indicator "></span>
                                                </label>
                                                </div>
                                            </div>
                                        </div>';
                                } else {
                                    echo '<div class="row">
                                            <div class="col-sm-12">
                                                <h5 style="display: inline-block">  ' . $value->getAction()['title'] . ' </h5>
                                                <div style="display: inline-block; position: absolute; left: 15px !important; top: 8px !important;">
                                                    <label class="custom-control material-checkbox">
                                                        <input type="checkbox" class="pull-right material-control-input checkSingle per_' . $i . '" name="permissions[]" value="' . $value->getName() . '" data-size="small" data-color="rgb(12, 105, 140)"/>
                                                        <span class="material-control-indicator "></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>';
                                }
                            }
                        }
                    }

                }
                echo '</div></div></div>';
            }
            if (!isset($value->getAction()['child']) && isset($value->getAction()['icon']) && !isset($value->getAction()['front']) && isset($value->getAction()['title']) && !isset($value->getAction()['hasFather'])) {
                $arr = [];
                $permission = Permission::where('role_id', $id)->select('permissions')->get();
                foreach ($permission as $key => $per) {
                    $arr[$key] = $per->permissions;
                }

                if (in_array($value->getName(), $arr)) {
                    echo '<div class="col-sm-3">
                            <div class="panel panel-color panel-inverse">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="display: inline-block"> ' . $value->getAction()['title'] . '</h3>
                                    <div style="display: inline-block; position: absolute; left: 20px !important;">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" class="pull-right material-control-input checkSingle per_' . $i . '" checked name="permissions[]" value="' . $value->getName() . '"  data-color="rgb(12, 105, 140)"/>
                                        <span class="material-control-indicator header-check"></span>
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>';
                } else {
                    echo '<div class="col-sm-6">
                            <div class="panel panel-color panel-purple">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="display: inline-block"> ' . $value->getAction()['title'] . '</h3>
                                    <div style="display: inline-block; position: absolute; left: 20px !important;">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" class="pull-right material-control-input checkSingle per_' . $i . '" name="permissions[]" value="' . $value->getName() . '"  data-color="rgb(12, 105, 140)"/>
                                        <span class="material-control-indicator header-check"></span>
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }

            }
        }
        $i++;
    }
    echo '</div>';
}

