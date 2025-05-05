        {{-- core header partial --}}
        @if (isset($partials['core_header']))
            @foreach ($partials['core_header'] as $partial)
                @include($partial->file_path, ['data' => $data])
            @endforeach
        @endif

    <body class="{{$data['page_class']}}" >

        <!-- ========== HEADER ========== -->
        <header id="header" class="u-header u-header-left-aligned-nav">
            <div class="u-header__section">
               {{-- header partial --}}
                @if (isset($partials['header']))
                    @foreach ($partials['header'] as $partial)
                        @include($partial->file_path, ['data' => $data])
                    @endforeach
                @endif

            </div>
        </header>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main">

            {{-- slider partial --}}
                @if (isset($partials['slider']))
                    @foreach ($partials['slider'] as $partial)
                        @include($partial->file_path, ['data' => $data])
                    @endforeach
                @endif

            {{-- breadcrump partial --}}
                @if (isset($partials['breadcrumb']))
                    @foreach ($partials['breadcrumb'] as $partial)
                        @include($partial->file_path, ['data' => $data])
                    @endforeach
                @endif

          
            <div class="container">               
            

                 {{-- section1 partial --}}                

                
                @if (isset($partials['section1']))
                    @foreach ($partials['section1'] as $partial)
                    	@if($partial->partial_name == $data['page_name'] )
                        	@include($partial->file_path, ['data' => $data])
                    	@endif                    	

                    @endforeach
                @endif

		  

            </div>
            
                {{-- section2 partial --}}

                @if (isset($partials['section2']))
                    @foreach ($partials['section2'] as $partial)
                        @include($partial->file_path, ['data' => $data])
                    @endforeach
                @endif

            <div class="container">

                
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== FOOTER ========== -->
          <section class="footer1">

             {{-- footer1 partial --}}

                @if (isset($partials['footer1']))
                    @foreach ($partials['footer1'] as $partial)
                        @include($partial->file_path, ['data' => $data])
                    @endforeach
                @endif

            <section>    
            
            </footer class="footer2">    

             {{-- footer2 partial --}}

                @if (isset($partials['footer2']))
                    @foreach ($partials['footer2'] as $partial)
                        @include($partial->file_path, ['data' => $data])
                    @endforeach
                @endif        
            
 
        </footer>
        <!-- ========== END FOOTER ========== -->     

        {{-- footer_bottom partial --}}

                @if (isset($partials['footer_bottom']))
                    @foreach ($partials['footer_bottom'] as $partial)
                        @include($partial->file_path, ['data' => $data])
                    @endforeach
                @endif      

    </body>
</html>
