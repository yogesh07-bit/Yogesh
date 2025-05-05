@extends('layouts.app')


@section('content')
        <div class="container-fluid">
            <h2 class="page-title">Menu Items</h2>
        </div>

        <div class="container-fluid">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-row gap-1 align-items-center">
                           <a href=".../../../../menus" class="p-2 cursor-pointer"><i class="fa fa-arrow-left"></i></a> <h5> {{ $title ? $title : 'No Item Found' }}</h5>
                        </div>
                        <button class="btn btn-primary" s="white-space: nowrap;" data-toggle="modal"
                            data-target="#add-modal">Add Menu Item</button>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Item Name</th>
                                    <th scope="col" class="text-center">Type</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="sortable-body">
                                @foreach($data as $menu)
                                    <tr data-id="{{ $menu->id }}">
                                        <td scope="row">{{ $loop->index + 1 }}</td>
                                        <td>{{ $menu->menu_items }}</td>
                                        <td>{{ $menu->menu_type }}</td>
                                        <td>
                                            <div class="d-flex flex-row justify-content-center gap-2">
                                                <a class="btn  btn-primary"><i class="fa fa-arrows-alt"></i></a>
                                                <a class="btn  btn-danger delete-menu-btn" data-id="{{ $menu->id }}"
                                                    style="white-space: nowrap;">Delete</a>
                                                <a class="btn  btn-success edit-menu-btn" data-id="{{ $menu->id }}" data-category-id="{{ $menu->category_id }}" data-title="{{ $menu->menu_items }}" data-type="{{ $menu->menu_type }}"
                                                    data-css-id="{{ $menu->css_id }}" data-css-class="{{ $menu->css_class }}" data-link="{{ $menu->menu_link }}"
                                                    style="white-space: nowrap;"><i class="fa fa-pencil"></i></a>
                                                @if ($menu->menu_type == "submenu")
                                                    <a class='btn  btn-primary open-sub-menuitem-modal' data-toggle="modal"
                                                        data-target="#item-add-modal" data-title="{{ $menu->menu_items }}" data-id="{{ $menu->id }}"
                                                        style='white-space: nowrap;'>Add Item</a>
                                                    <a class='btn  btn-primary get-sub-menu-list'  data-title="{{ $menu->menu_items }}" data-id="{{ $menu->id }}"
                                                        style='white-space: nowrap;'>Show List</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content" id="menu-add-form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new Menu ({{ $title ? $title : 'No Item Found' }})
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group py-2">
                            <label class="form-label">name/title</label>
                            <input type="text" placeholder="name/title" name="name" class="form-control" />
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label">Menu type</label>
                            <select id="menu-type-choose" name="type" class="form-control">
                                <option selected value="">Choose an menu type</option>
                                <option value="single">Single</option>
                                <option value="submenu">Sub-Menu</option>
                                <option value="external">external</option>
                            </select>
                        </div>
                        <div id="conditional-input">

                        </div>

                        <div class="form-group py-2">
                            <label class="form-label">class<span class="text-primary">(optional)</span></label>
                            <input type="text" placeholder="class1 class2 etc" name="className" class="form-control" />
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label">id <span class="text-primary">(optional)</span></label>
                            <input type="text" placeholder="id" name="id" class="form-control" />
                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="d-flex w-100 gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        <div id="add-modal-message" class="w-100"></div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="item-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content" id="sub-menu-add-form">
                    <div class="modal-header">
                        <h5 class="modal-title sub-item-model-title" id="exampleModalLabel"></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group py-2">
                            <label class="form-label">name/title</label>
                            <input type="text" placeholder="name/title" name="name" class="form-control" />
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label">Menu type</label>
                            <select id="item-menu-type-choose" name="type" class="form-control">
                                <option selected value="">Choose an menu type</option>
                                <option value="single">Single</option>
                                <option value="external">external</option>
                                <!-- <option value="dynamic">dynamic</option> -->
                            </select>
                        </div>
                        <div id="item-conditional-input">

                        </div>

                        <div class="form-group py-2">
                            <label class="form-label">class<span class="text-primary">(optional)</span></label>
                            <input type="text" placeholder="class1 class2 etc" name="className" class="form-control" />
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label">id <span class="text-primary">(optional)</span></label>
                            <input type="text" placeholder="id" name="id" class="form-control" />
                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="d-flex w-100 gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        <div id="add-item-modal-message" class="w-100"></div>
                    </div>
                </form>
            </div>
        </div>

        @include("admin.function")
    {{$id}}

        <script>
            $(document).ready(function() {

                window.__order__ = async (__from__, __to__, __id__) => {
                    const {
                        status,
                        error,
                        message
                    } = await postAPI("update/menu/item/order", {
                        from: (__from__ + 1),
                        to: (__to__ + 1),
                        category_id: "{{ $id }}",
                        id: __id__
                    });

                    if (status && status) {
                        window.location.reload();
                    }
                }
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new Sortable(document.getElementById('sortable-body'), {
                    animation: 150,
                    onEnd: async function({
                        oldIndex,
                        newIndex,
                        item}) {
                            const currentId = item.getAttribute('data-id');
                            await __order__(oldIndex, newIndex, currentId);
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                var __additional__ = $("#conditional-input");
                const __pages__ = (__routes__) => {

                    var __html__ = `<div class="form-group py-2">
                                          <label class="form-label">Link</label>
                                           <input type="text" placeholder="Choose a link" list="routes" name="link" class="form-control" />`;
                    __html__ += `<datalist id="routes"><option selected value="">Choose a menu type</option>`;
                    __routes__.forEach(route => {
                        __html__ += `<option value="${route}">${route}</option>`;
                    });
                    __html__ += `</datalist></div>`;
                    __additional__.html(__html__);
                }


                $(document).on("submit", "#menu-add-form", async function(e) {
                    e.preventDefault(); // Prevent default form submission
                    var __sms__ = $("#add-modal-message");
                    var __this__ = $(this);
                    const formData = new FormData(this); // Get form data
                    const {
                        name,
                        type,
                        link,
                        className,
                        id
                    } = Object.fromEntries(formData); // Convert to a JSON object

                    if (name === "") {
                        __sms__.html("<div class='alert alert-danger py-1'>Name field is required</div>");
                    } else if (type === "") {
                        __sms__.html("<div class='alert alert-danger py-1'>Type field is required</div>");
                    } else if (link === "") {
                        __sms__.html("<div class='alert alert-danger py-1'>Link field is required</div>");
                    } else {

                        const {
                            status,
                            error,
                            message
                        } = await postAPI("insert/menu/item", {
                            name,
                            type,
                            link,
                            className,
                            id,
                            category_id: "{{ $id }}"
                        });
                        if (error && error) {
                            __sms__.html(`<div class='alert alert-warning py-1'>${message}</div>`);
                        }
                        if (status && status) {
                            __sms__.html(`<div class='alert alert-success py-1'>Menu item Created.</div>`);
                            window.location.reload();
                        }

                    }
                });


          $(document).on("change", "#menu-type-choose", async function(e) {
                    var __type__ = $(this).val();
                    if (__type__ == "external") {
                        var __html__ = `<div class="form-group py-2">
                                              <label class="form-label">External Link</label>
                                               <input type="text" placeholder="https://google.com" name="link" class="form-control" />`;
                        __additional__.html(__html__);
                        return false;
                    }
                    if (__type__ == 'single') {
                        const {
                            response
                        } = await getAPI('all/routes');
                        if (response) {
                            __pages__(response);
                        }
                    } else {
                        __additional__.html("");
                    }
                });

                $(document).on("click", ".delete-menu-btn", async function(e) {
                    e.preventDefault(); // Prevent default form submission

                    var __this__ = $(this);
                    var id = __this__.data("id");
                    if (confirm("Are you sure you want to delete the record?")) {
                        const {
                            status,
                            error,
                            message
                        } = await postAPI("delete/menu-item", {
                            id
                        });
                        if (status && status) {
                            window.location.reload();
                        }
                    }

                });


            });
        </script>


        <script>
            $(document).ready(function() {



                var __editID__ = null;
                var __editCatID__ = null;
                $(document).on("click", ".edit-menu-btn", function(e) {

                    var __this__ = $(this);
                    __editID__ = __this__.data("id");
                    __editCatID__ = __this__.data("category-id");
                    var __title__ = __this__.data("title");
                    var __type__ = __this__.data("type");
                    var __cssId__ = __this__.data("css-id");
                    var __cssClass__ = __this__.data("css-class");
                    var __link__ = __this__.data("link");

                    var __body__ = `<form id="menu-edit-form">

                       <div class="form-group py-2">
                            <label class="form-label">name/title</label>
                            <input type="text" value="${__title__}" placeholder="name/title" name="name" class="form-control" />
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label">Menu type</label>
                            <select id="edit-menu-type-choose" name="type" class="form-control" data-link="${__link__}">
                                <option selected value="${__type__}">${__type__}</option>
                                <option value="single">Single</option>
                                <option value="submenu">Sub-Menu</option>
                                <option value="external">external</option>
                            </select>
                        </div>
                        <div class="edit-conditional-input">`;

                            if (__type__ == "external") {
                          __body__ += `<div class="form-group py-2">
                                              <label class="form-label">External Link</label>
                                               <input type="text" placeholder="https://google.com" value="${__link__}" name="link" class="form-control" /></div>`;

                    }
                    if (__type__ == 'single') {

                              __body__ += `<div class="form-group py-2">
                                          <label class="form-label">Link</label>
                                           <input type="text" placeholder="Choose a link" list="routes"value="${__link__}"  name="link" class="form-control" />`;

                            __body__ += ` </div>`;

                    }
                       __body__ +=`</div>

                        <div class="form-group py-2">
                            <label class="form-label">class<span class="text-primary">(optional)</span></label>
                            <input type="text" placeholder="class1 class2 etc" value="${__cssClass__}" name="className" class="form-control" />
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label">id <span class="text-primary">(optional)</span></label>
                            <input type="text" placeholder="id" value="${__cssId__}" name="id" class="form-control" />
                        </div>

                            <div class="d-flex w-100 gap-2">
                                <button type="button" class="btn btn-danger close-btn" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div></form>`;
                    openModal("Edit Menu Item", __body__, `<div id="edit-modal-message" class="w-100"></div>`);
                });

                $(document).on("submit", "#menu-edit-form", async function(e) {
                    e.preventDefault(); // Prevent default form submission
                    var __sms__ = $("#edit-modal-message");
                    var __this__ = $(this);
                    const formData = new FormData(this); // Get form data
                     const {
                        name,
                        type,
                        link,
                        className,
                        id
                    } = Object.fromEntries(formData); // Convert to a JSON object

                    if (name === "") {
                        __sms__.html("<div class='alert alert-danger py-1'>Name field is required</div>");
                    } else if (type === "") {
                        __sms__.html("<div class='alert alert-danger py-1'>Type field is required</div>");
                    } else if (link === "") {
                        __sms__.html("<div class='alert alert-danger py-1'>Link field is required</div>");
                    } else {

                        const {
                            status,
                            error,
                            message
                        } = await postAPI("update/menu/item", {
                            name,
                            type,
                            link,
                            className,
                            cssId: id,id: __editID__,category_id: __editCatID__
                        });
                        if (error && error) {
                            __sms__.html(`<div class='alert alert-warning py-1'>${message}</div>`);
                        }
                        if (status && status) {
                            __sms__.html(`<div class='alert alert-success py-1'>Menu item Updated.</div>`);
                            window.location.reload();
                        }
                    }
                });





                $(document).on("change", "#edit-menu-type-choose", async function (e) {
                    var __this__ = $(this);
                    var __type__ = __this__.val();
                    if (__type__ == "external") {
                        var __html__ = `<div class="form-group py-2">
                                              <label class="form-label">External Link</label>
                                               <input type="text" placeholder="https://google.com" name="link" class="form-control" />`;
                        __this__.parents(".form-group").siblings(".edit-conditional-input").html(__html__);
                        return false;
                    }
                    if (__type__ == 'single') {
                        const {
                            response
                        } = await getAPI('all/routes');
                        if (response) {
                                   var __html__ = `<div class="form-group py-2">
                                          <label class="form-label">Link</label>
                                           <input type="text" placeholder="Choose a link" list="routes" name="link" class="form-control" />`;
                            __html__ += `<datalist id="routes"><option selected value="">Choose a menu type</option>`;
                            response.forEach(route => {
                                __html__ += `<option value="${route}">${route}</option>`;
                            });
                            __html__ += `</datalist></div>`;
                            __this__.parents(".form-group").siblings(".edit-conditional-input").html(__html__);
                        }
                    } else {
                        __this__.parents(".form-group").siblings(".edit-conditional-input").html("");
                    }
                });



            });
        </script>

        <script>
            $(document).ready(function () {
                var __additional__ = $("#item-conditional-input");
                const __pages__ = (__routes__) => {

                    var __html__ = `<div class="form-group py-2">
                                          <label class="form-label">Link</label>
                                           <input type="text" placeholder="Choose a link" list="routes" name="link" class="form-control" />`;
                    __html__ += `<datalist id="routes"><option selected value="">Choose a menu type</option>`;
                    __routes__.forEach(route => {
                        __html__ += `<option value="${route}">${route}</option>`;
                    });
                    __html__ += `</datalist></div>`;
                    __additional__.html(__html__);
                }

                $(document).on("change", "#item-menu-type-choose", async function (e) {
                    var __type__ = $(this).val();
                    if (__type__ == "external") {
                        var __html__ = `<div class="form-group py-2">
                                              <label class="form-label">External Link</label>
                                               <input type="text" placeholder="https://google.com" name="link" class="form-control" />`;
                        __additional__.html(__html__);
                        return false;
                    }
                    if (__type__ == 'single') {
                        const {
                            response
                        } = await getAPI('all/routes');
                        if (response) {
                            __pages__(response);
                        }
                    } else {
                        __additional__.html("");
                    }
                });

               var __item_id__ = null;
                $(document).on("click", ".open-sub-menuitem-modal", function (e) {

                    var __this__ = $(this);
                    __item_id__ = __this__.data("id");
                    var __title__ = __this__.data("title");
                    $(".sub-item-model-title").text(`Add submenu item : ${__title__}`);

                });


                $(document).on("submit", "#sub-menu-add-form", async function (e) {
                    e.preventDefault(); // Prevent default form submission
                    var __sms__ = $("#add-item-modal-message");
                    var __this__ = $(this);
                    const formData = new FormData(this); // Get form data
                    const {
                        name,
                        type,
                        link,
                        className,
                        id
                    } = Object.fromEntries(formData); // Convert to a JSON object

                    if (name === "") {
                        __sms__.html("<div class='alert alert-danger py-1'>Name field is required</div>");
                    } else if (type === "") {
                        __sms__.html("<div class='alert alert-danger py-1'>Type field is required</div>");
                    } else if (link === "") {
                        __sms__.html("<div class='alert alert-danger py-1'>Link field is required</div>");
                    } else {

                        const {
                            status,
                            error,
                            message
                        } = await postAPI("insert/sub-menu/item", {
                            name,
                            type,
                            link,
                            className,
                            cssId: id, id: __item_id__
                        });
                        if (error && error) {
                            __sms__.html(`<div class='alert alert-warning py-1'>${message}</div>`);
                        }
                        if (status && status) {
                            __sms__.html(`<div class='alert alert-success py-1'>Menu item Updated.</div>`);
                            window.location.reload();
                        }
                    }
                });




                $(document).on("click", ".get-sub-menu-list", async function (e) {
                    e.preventDefault(); // Prevent default form submission

                    var __this__ = $(this);
                    var id = __this__.data("id");
                    var __title__ = __this__.data("title");
                    const {
                        response,
                        error,
                        message
                    } = await postAPI("fetch/sub-menu/item", {id});
                    if (response) {
                        var __body__ = "";
                        __body__ += `<div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Item Name</th>
                                    <th scope="col" class="text-center">#Link</th>
                                    <th scope="col" class="text-center">Css Class</th>
                                    <th scope="col" class="text-center">Css Id</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>`;
                        $.each(response, function (index, {item_name,menu_id,menu_link,css_class,css_id,order,id}) {
                            var __sl__ = Number(index) + 1;
                                    __body__ += `<tr>
                                        <td scope="row">${__sl__}</td>
                                        <td>${item_name}</td>
                                        <td>${menu_link}</td>
                                        <td>${css_class ? css_class : ''}</td>
                                        <td>${css_id ? css_id : ''}</td>
                                        <td>
                                            <div class="d-flex flex-row justify-content-center gap-2">
                                                    <a class='btn  btn-danger delete-sub-menuitem'  data-id="${ id }"
                                                        style='white-space: nowrap;'>Delete</a>
                                            </div>
                                        </td>
                                    </tr>`;
                                });


                            __body__ +=`</tbody>
                        </table>
                    </div>`;
                      $("#modal").children(".modal").addClass("lg");
                        openModal(`List:  ${__title__}`, __body__);
                    }else{
                        openModal(`List:  ${__title__}`, dataNotFound());

                    }
                });

                $(document).on("click", ".delete-sub-menuitem", async function (e) {
                    e.preventDefault(); // Prevent default form submission

                    var __this__ = $(this);
                    var id = __this__.data("id");

                   if (confirm("Are you sure you want to delete the record?")) {
                        __this__.attr("disabled", true);
                        const {
                            status,
                            error,
                            message
                        } = await postAPI("delete/sub-menu/item", {
                            id
                        });
                        if (status && status) {
                           window.location.reload();
                        }
                    }
                });








            });
        </script>

@endsection
