<?php

function asset_url($uri = ''){
    return base_url('store_assets') . '/' . $uri;
}

function admin_url($url = ''){
    return base_url('admin') . '/' . $uri;
}
