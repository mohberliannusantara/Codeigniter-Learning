<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['per_page'] = 10;
$config["uri_segment"] = 3;

$config["first_tag_open"] = '<li class="page-item"><span class="page-link">';
$config["first_tag_close"] = '</span><li>';

$config['full_tag_open'] = '<br><nav><ul class="pagination justify-content-center">';
$config['full_tag_close'] = '</ul></nav>';

$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['prev_tag_close'] = '</span><li>';

$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['num_tag_close'] = '</span></li>';

$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['next_tag_close'] = '</span><li>';

$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

$config["last_tag_open"] = '<li class="page-item"><span class="page-link">';
$config["last_tag_close"] = '</span><li>';
