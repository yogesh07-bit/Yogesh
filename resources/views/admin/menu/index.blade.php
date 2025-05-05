@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2 class="page-title">Menu Titles</h2>
    </div>

    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- <div class="d-flex flex-column">
                                                                                                                                <h5>Hoverable rows</h5><span>Use a class <code>table-hover</code> to enable a hover state on table
                                                                                                                                    rows
                                                                                                                                    within a <code>tbody</code>.</span>
                                                                                                                            </div> -->
                    <h5>All Menus</h5>
                    <button class="btn btn-primary" style="white-space: nowrap;" data-toggle="modal"
                        data-target="#add-modal">Add Menu</button>

                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Display Title</th>
                                <th scope="col">Description</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="show-data"></tbody>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add new Menu</h5>
                </div>
                <div class="modal-body">

                    <div class="form-group py-2">
                        <label class="form-label">Menu name/title</label>
                        <input type="text" placeholder="name/title" name="name" class="form-control" />
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label">Description</label>
                        <textarea type="text" placeholder="text..." name="description" class="form-control"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <div class="d-flex w-100 gap-2">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div id="add-modal-message" class="w-100"></div>
                </div>
            </form>
        </div>
    </div>



    @include("admin.function")

    <script>
        $(document).ready(function() {

            const __fetch__ = async () => {
                var __table__ = $(".show-data");
                const {
                    response,
                    error,
                    message
                } = await getAPI("menus");

                if (error || response?.length === 0) {
                    __table__.html(dataNotFound());
                } else {
                    var __html__ = "";
                    $.each(response, function(index, {
                        category_name,
                        id,
                        status,
                        display_title,
                        description,
                    }) {
                        var __sl__ = Number(index) + 1;
                        __html__ += ` <tr>
                                                                    <td scope="row">${__sl__}</td>
                                                                    <td>${category_name}</td>

                                                                    <td>
                                                                        <div data-id="${id}"
                                                                            class="toggle-btn status-toggle-btn ${status == 1 ? "active bg-primary" : "bg-light"} p-relative rounded-full cursor-pointer">
                                                                            <label
                                                                                class="indicator rounded-full p-absolute ${status == 1 ? "bg-white" : "bg-primary"} cursor-pointer"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>

                                                                        <div data-id="${id}"
                                                                            class="toggle-btn display-title-toggle-btn ${display_title == 1 ? "active bg-primary" : "bg-light"} p-relative rounded-full cursor-pointer">
                                                                            <label
                                                                                class="indicator rounded-full p-absolute ${display_title == 1 ? "bg-white" : "bg-primary"} cursor-pointer"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>${description}</td>
                                                                    <td>
                                                                        <div class="d-flex flex-row gap-1">

                                                                            <a  data-description="${description}"
                                                                                data-title="${category_name}" class="btn btn-success px-3 edit-menu-btn"
                                                                                data-id="${id}" style="white-space: nowrap;"><i
                                                                                    class="fa fa-pencil"></i></a>
                                                                            <a class="btn btn-danger px-3 delete-menu-btn" data-id="${id}"
                                                                                style="white-space: nowrap;"><i class="fa fa-trash"></i></a>
                                                                            <a href="../admin/menus/view/${id}" class="btn btn-primary"
                                                                                style="white-space: nowrap;">show</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>`;
                    });
                    __table__.html(__html__);
                }

            }
            __fetch__();


            $(document).on("submit", "#menu-add-form", async function(e) {
                e.preventDefault(); // Prevent default form submission
                var __sms__ = $("#add-modal-message");
                var __this__ = $(this);
                const formData = new FormData(this); // Get form data
                const {
                    name,
                    description
                } = Object.fromEntries(formData); // Convert to a JSON object
                if (name === "") {
                    __sms__.html("<div class='alert alert-danger py-1'>Name field is required</div>");
                } else if (description === "") {
                    __sms__.html("<div class='alert alert-danger py-1'>Description field is required</div>");

                } else {
                    const {
                        status,
                        error,
                        message
                    } = await postAPI("insert/add-menu", {
                        name,
                        description
                    });
                    if (error && error) {
                        __sms__.html(`<div class='alert alert-warning py-1'>${message}</div>`);
                    }
                    if (status && status) {
                        __sms__.html(`<div class='alert alert-success py-1'>Menu Created.</div>`);
                        __fetch__();
                        __this__.trigger("reset");
                    }
                }
            });


            $(document).on("click", ".status-toggle-btn", async function(e) {
                e.preventDefault(); // Prevent default form submission
                var __this__ = $(this);
                var id = __this__.data("id");
                const {
                    status,
                    error,
                    message
                } = await postAPI("update/toggle/menu/status", {
                    id
                });
                if (status && status) {
                    __fetch__();
                }
            });

            $(document).on("click", ".display-title-toggle-btn", async function(e) {
                e.preventDefault(); // Prevent default form submission
                var __this__ = $(this);
                var __id__ = __this__.data("id");
                var id = __this__.data("id");
                const {
                    status,
                    error,
                    message
                } = await postAPI("update/toggle/menu/display/title", {
                    id
                });
                if (status && status) {
                    __fetch__();
                }
            });

            $(document).on("click", ".delete-menu-btn", async function(e) {
                e.preventDefault(); // Prevent default form submission

                var __this__ = $(this);
                var id = __this__.data("id");
                if (confirm("Are you sure you want to delete the record?")) {
                    __this__.attr("disabled", true);
                    const {
                        status,
                        error,
                        message
                    } = await postAPI("delete/menu", {
                        id
                    });
                    if (status && status) {
                        __fetch__();
                    }
                }

            });

            var __editID__ = null;
            $(document).on("click", ".edit-menu-btn", function(e) {

                var __this__ = $(this);
                __editID__ = __this__.data("id");
                var __title__ = __this__.data("title");
                var __description__ = __this__.data("description");

                const __body__ = `<form id="menu-edit-form">
                       <div class="form-group py-2">
                            <label class="form-label">Menu name/title</label>
                            <input type="text" placeholder="name/title" value="${__title__}" name="name" class="form-control" />
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label">Description</label>
                            <textarea type="text" placeholder="text..."  name="description"
                                class="form-control">${__description__}</textarea>
                        </div>
                        <div class="d-flex w-100 gap-2">
                            <button type="button" class="btn btn-danger close-btn" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div></form>`;
                openModal("Edit Menu Title", __body__, `<div id="edit-modal-message" class="w-100"></div>`);
            });

            $(document).on("submit", "#menu-edit-form", async function(e) {
                e.preventDefault(); // Prevent default form submission
                var __sms__ = $("#edit-modal-message");
                var __this__ = $(this);
                const formData = new FormData(this); // Get form data
                const {
                    name,
                    description
                } = Object.fromEntries(formData); // Convert to a JSON object
                if (name === "") {
                    __sms__.html("<div class='alert alert-danger py-1'>Name field is required</div>");
                } else if (description === "") {
                    __sms__.html("<div class='alert alert-danger py-1'>Description field is required</div>");

                } else {
                    const {
                        status,
                        error,
                        message
                    } = await postAPI("update/edit-menu", {
                        name,
                        description,
                        id: __editID__
                    });
                    console.log(status, message);

                    if (error && error) {
                        __sms__.html(`<div class='alert alert-warning py-1'>${message}</div>`);
                    }
                    if (status && status) {
                        __sms__.html(`<div class='alert alert-success py-1'>Menu Updated.</div>`);
                        __fetch__();
                        closeModal();
                    }
                }
            });

        });
    </script>
@endsection
