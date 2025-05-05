<div class="tab-pane fade {{ $loop->iteration == 1 ? 'show active' : '' }}" 
             id="pills-{{ Str::slug($item->section_title, '-') }}" 
             role="tabpanel" 
             aria-labelledby="pills-{{ Str::slug($item->section_title, '-') }}-tab">
            <ul class="row list-unstyled products-group no-gutters">
                                       
                @include('partials.section.'.$item->product_template)
            </ul>
        </div>