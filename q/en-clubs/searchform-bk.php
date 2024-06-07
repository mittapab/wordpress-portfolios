<!-- <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field en" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" />
                </label>
                <input type="hidden" name="post_type" value="enclubs" />
                <input type="submit" class="search-submit" value="Search" />
</form> -->
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-form__input">
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search..." />
    </div>
    <div class="search-form__select">
        <?php
        $categories = get_categories(); // ดึงหมวดหมู่ทั้งหมด
        echo '<select name="cat" id="cat">';
        echo '<option value="">Select category...</option>';
        foreach ($categories as $category) {
            echo '<option value="' . $category->term_id . '">' . $category->name . '</option>'; // สร้างตัวเลือกสำหรับแต่ละหมวดหมู่
        }
        echo '</select>';
        ?>
    </div>
    <div class="search-form__submit">
        <button type="submit" class="search-submit">Search</button>
    </div>
</form>

$categories = get_categories(array(
    'taxonomy' => 'taxonomy_name', // ชื่อของ taxonomy ที่เกี่ยวข้องกับ custom post type
    'post_type' => 'your_custom_post_type', // ชื่อของ custom post type ที่ต้องการดึงหมวดหมู่
    'hide_empty' => 0, // ให้แสดงหมวดหมู่ที่ไม่มีเนื้อหาด้วย
));
