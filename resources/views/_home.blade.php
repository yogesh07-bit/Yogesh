@include("partials/core_head")

    <body>

        <!-- ========== HEADER ========== -->
        <header id="header" class="u-header u-header-left-aligned-nav">
            <div class="u-header__section">
               
                @include("partials/topbar")
                @include("partials/logo_search_header")
                @include("partials/verticle_secondary_menu")

            </div>
        </header>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main">

            @include("partials/main_slider")

            @include("partials/category_menus")


            <div class="container">
                
                @include("partials/short_banner")


                @include("partials/left_highlight")


            </div>
            
            @include("partials/middle_highlight")


            <div class="container">


            @include("partials/simple_tabs")
            

            @include("partials/banner_a")
            

            @include("partials/single_row")
            

            @include("partials/brand")
               
                
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== FOOTER ========== -->
        <footer>
        
        @include("partials/footer_widget")
        
        @include("partials/newsletter")
        
        @include("partials/footer_menu_logo")

        @include("partials/footer_copyright")            
            
 
        </footer>
        <!-- ========== END FOOTER ========== -->

        <!-- ========== SECONDARY CONTENTS ========== -->
        @include("partials/sidebar_navigation") 
        <!-- ========== END SECONDARY CONTENTS ========== -->

        @include("partials/core_footer") 
    </body>
</html>
