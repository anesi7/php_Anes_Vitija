<?php
$unique_id = esc_atttr(uniqid("search-form"));
?>
<form role="search" method="get"class="searc0h-form" action="<?php echo esc_url(home_url('/'));?>">
    <label class="screen-reader-rext" for="<?php echo $unique_id?>">
</label>

<input type="search" id="<?php echo $unique_id;?>"
class="search-field"
placeholder="<?php esc_attr_e("search...","your-textdomain")?>"
value="<?php echo get_search_query();?>" name="s"/>

<input
type="submit"
class="search-submit"
 value="<?php esc_attr_e("Search","your-textdomain")?>">
</form>