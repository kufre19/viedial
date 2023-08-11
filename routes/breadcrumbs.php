<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for("sub.module", function($trail,$course_id,$mod_id,$sub_mod_id)
{
    $trail->push("Sub Module", route("load.sub.module",["course_id"=>$course_id,"mod_id"=>$mod_id,"sub_mod_id"=>$sub_mod_id]));
});