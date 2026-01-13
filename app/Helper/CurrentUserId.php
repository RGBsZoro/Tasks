<?php

function currentUserId(){
    return auth('api')->id();
}