<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <label>

                    <div style="position: relative;"> ค้นหาน้อง : <span>  <input type="search" class="search-field en" style="height: 10px;padding: 15px 15px 15px 20px;
                    border-radius: 50px; width: 280px;position: absolute;margin-top: -10px;left: 80px;"
                    placeholder="ชื่อ , รายละเอียด" value="<?php echo get_search_query(); ?>" name="s" />

              
                <input type="hidden" name="post_type" value="enclubs" />
                <input type="submit" class="search-submit" style="position: absolute;left: 330px;padding: 9px 20px 9px 20px;margin-top: -10px;" value="ค้นหา" />
            </span> </div>   
            </label>                          
</form>


