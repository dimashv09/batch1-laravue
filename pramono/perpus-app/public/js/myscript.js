var app = new Vue({
    el: "#app",
    data: {
        datas: [], // variable yang akan menampung smua data penulis
        data: {}, // variable untuk prepare crud
        action, // variable action form
        api, // url ajax
        method: false,
        message: "",
    },
    mounted: function () {
        this.run_datatable();
        // mounted sama seperti __construct dalam OOP PHP
    },
    methods: {
        run_datatable() {
            const _this = this;
            _this.table = $(".table")
                .DataTable({
                    ajax: {
                        url: _this.api,
                        type: "GET",
                    },
                    columns,
                })
                .on("xhr", function () {
                    _this.datas = _this.table.ajax.json().data;
                });
        },
        store() {
            this.data = {};
            this.method = false;
            $(".modal-title").text("Tambah Penulis");
            $("#exampleModal").modal();
        },
        update(event, id) {
            this.data = this.datas[id];
            console.log(id);
            this.method = true;
            $(".modal-title").text("Edit Penulis");
            $("#exampleModal").modal();
        },
        destroy(event, id) {
            this.action += "/" + id;
            const _this = this;
            if (confirm("Apakah Anda yakin ingin menghapusnya?")) {
                axios
                    .post(this.action, { _method: "DELETE" })
                    .then((response) => {
                        _this.table.ajax.reload();
                        this.message = "Data berhasil dihapus";
                        Swal.fire(this.message);
                    });
            }
        },
        submitForm(event, id) {
            event.preventDefault();
            const _this = this;
            var action = !this.method ? this.action : this.action + "/" + id;
            this.message = !this.method
                ? "Data Berhasil ditambahkan"
                : "Data berhasil diubah";
            axios
                .post(action, new FormData($(event.target)[0]))
                .then((response) => {
                    $("#exampleModal").modal("hide");
                    _this.table.ajax.reload();
                    Swal.fire(this.message);
                })
                .catch(function (error) {
                    if (error.response) {
                        var message_error = error.response.data.errors;
                        var error_element = "";
                        $.each(
                            message_error,
                            function (indexInArray, valueOfElement) {
                                error_element += `<div clas='text-danger'> ${valueOfElement}</div> <br>`;
                            }
                        );

                        Swal.fire({
                            title: "Gagal!",
                            icon: "error",
                            html: error_element,
                            confirmButtonText: "Ulangi",
                        });
                    }
                });
        },
    },
});
