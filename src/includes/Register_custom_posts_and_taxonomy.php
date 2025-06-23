<?php

declare(strict_types=1);

namespace BackendManager\includes;

if (!defined('ABSPATH'))
  die();

class Register_custom_posts_and_taxonomy
{
  public function __construct() {
    add_theme_support('post-thumbnails');
    add_action(hook_name: "init", callback: [$this, "AllCustomPostName"]);
  }
  public function AllCustomPostName()
  {
    $this->setArgForPostsAndRegister(
      "Bookings",
      "booking",
      true,
      "dashicons-book",
      true,
      ['slug' => 'Bookings'],
      ['title', 'editor', 'thumbnail', 'custom-fields'],
      true
    );
  }
  public function setArgForPostsAndRegister($name, $slug, $public, $menuIcon, $has_archive, $rewrite, $supports, $showInRest)
  {
    $arg = [
      'labels' => [
        'name' => __($name, 'backend-manager'),
        'singular_name' => __($slug, 'backend-manager'),
        'menu_name' => __($name, 'backend-manager'),
        'add_new' => __('Add New', 'backend-manager'),
        'add_new_item' => __("Add New $slug", 'backend-manager'),
        'new_item' => __("New $slug", 'backend-manager'),
        'edit_item' => __("Edit $slug", 'backend-manager'),
        'view_item' => __("View $slug", 'backend-manager'),
        'all_items' => __("All {$name}", 'backend-manager'),
      ],
      "public" => $public,
      "menu_icon" => $menuIcon,
      "has_archive" => $has_archive,
      "rewrite" => $rewrite,
      "supports" => $supports,
      "show_in_rest" => $showInRest
    ];
    register_post_type($slug, $arg);
  }
}
