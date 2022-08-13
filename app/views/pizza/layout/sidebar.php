<aside>
    <div class="sidebar left ">
        <div class="user-panel">

            <?php if(isset($_SESSION['user_name'])): ?>
                <div class="pull-left image">
                <img src="http://via.placeholder.com/160x160" class="rounded-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?=$_SESSION['user_name']?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            <?php endif; ?>
        </div>

        <?php if(!isset($_SESSION['user_name'])): ?>
        <ul class="list-sidebar bg-defoult">
            <li> <a href="#" data-toggle="collapse" data-target="#players" class="collapsed active"> <i class="fa fa-th-large"></i> <span class="nav-label"> Pizza </span> <span class="fa fa-chevron-left pull-right"></span> </a>
                <ul class="sub-menu collapse" id="players">
                    <li><a href="<?=ROOT?>menu">Menu</a></li>
                    <li><a href="<?=ROOT?>cart">Giỏ Hàng</a></li>
                    <!-- <li><a href="<?=ROOT?>players/AddPlayer">Add players</a></li> -->
                </ul>
            </li>
        </ul>
        <?php else: ?>
            <ul class="list-sidebar bg-defoult">
            <li> <a href="#" data-toggle="collapse" data-target="#players" class="collapsed active"> <i class="fa fa-th-large"></i> <span class="nav-label"> Đơn hàng </span> <span class="fa fa-chevron-left pull-right"></span> </a>
                <ul class="sub-menu collapse" id="players">
                    <li><a href="<?=ROOT?>stafforder">Hiện đơn hàng</a></li>
                    <!-- <li><a href="<?=ROOT?>cart">Giỏ Hàng</a></li> -->
                    <!-- <li><a href="<?=ROOT?>players/AddPlayer">Add players</a></li> -->
                </ul>
            </li>
        
        </ul>
        <?php endif; ?>
    </div>
</aside>

<!-- <script>
    jQuery(function($) {

        $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if (
                $(this)
                .parent()
                .hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .parent()
                    .removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .next(".sidebar-submenu")
                    .slideDown(200);
                $(this)
                    .parent()
                    .addClass("active");
            }
        });

        $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
        });
    });
</script> -->