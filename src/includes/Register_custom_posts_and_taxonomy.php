<?php
declare(strict_types=1);
namespace BackendManager\includes;

if (!defined('ABSPATH'))
  die();

class Register_custom_posts_and_taxonomy
{
  public function __construct()
  {
    add_action(hook_name: "init", callback: [$this, "AllCustomPostName"]);
  }
  public function AllCustomPostName()
  {
    return [
      "Property" => $this->setArgForPosts(
        "Properties",
        "property",
        true,
        "dashicons-book",
        true,
        ['slug' => 'properties'],
        ['title', 'editor', 'thumbnail', 'custom-fields'],
        true
      ),
      "Book" => $this->setArgForPosts(
        "Books",
        "book",
        true,
        "dashicons-book",
        true,
        ['slug' => 'Books'],
        ['title', 'editor', 'thumbnail', 'custom-fields'],
        true
      ),
    ];
  }
  public function setArgForPosts($name, $singleName, $public, $menuIcon, $has_archive, $rewrite, $supports, $showInRest)
  {
    $arg = [
      'labels' => [
        'name' => $name,
        'singular_name' => $singleName,
        'menu_name' => $name,
        'add_new' => "Add New {$singleName}",
        'add_new_item' => "Add New {$singleName}",
        'new_item' => "New {$singleName}",
        'edit_item' => "Edit {$singleName}",
        'view_item' => 'View {$singleName}',
        'all_items' => "All {$name}",
      ],
      "public" => $public,
      "menu-icon" => $menuIcon,
      "has_archive" => $has_archive,
      "rewrite" => $rewrite,
      "supports" => $supports,
      "show_in_rest" => $showInRest
    ];
    register_post_type($name, $arg);
  }

}
