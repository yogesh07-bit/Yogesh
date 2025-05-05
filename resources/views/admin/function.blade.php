<script type="text/javascript">
    $(document).ready(function () {
        window.getAPI = async (__url__) => {

            return Promise.resolve($.ajax({
                url: `{{ config('app.url') }}/admin/fetch/${__url__}`,
                method: "get",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function (data) {
                    return data;
                },
                error: function (error) {
                    return { error: true, message: error };
                }
            }));
        }


        window.postAPI = async (__url__, __data__ = {}, __option__ = { dataType: "json" }) => {
            let __settings__ = { ...__option__ }

            return Promise.resolve($.ajax({
                url: `{{ config('app.url') }}/admin/${__url__}`,
                method: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { ...__data__ },
                ...__settings__,
                success: function (data) {
                    return data;
                },
                error: function (error) {
                    return { error: true, message: error };
                }
            }));
        }

        window.dataNotFound = (__text__ = "DATA NOT FOUND") => {

            return `<div class="p-3"><h2>${__text__}</h2></div>`;
        }

        window.openModal = (title = "Modal Title", body, footer) => {

            $("#modal").show();
            var __header__ = $(".modal-center-header");
            var __body__ = $(".modal-center-body");
            var __footer__ = $(".modal-center-footer");
            __header__.html(`<h3>${title}</h3><button type="button" class="btn px-2 close-btn text-danger"><i class="fa fa-times"></i></button>`);
            if (body) {
                __body__.html(body);
            }
            if (footer) {
                __footer__.html(footer);
            }
        }
        window.closeModal = () => {
            $("#modal").hide();
        }



    });
</script>
