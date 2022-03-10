const controller = new Vue({
    el: "#controller",
    data: {
        datas: [],
        data: {},
        actionUrl,
        apiUrl,
        status: false,
    },
    mounted: function() {
        this.fetchDataTable();
    },
    methods: {
        fetchDataTable: function() {
            axios.get(this.apiUrl).then(response => {
                this.datas = response.data;
            });

        },
        addData() {
            this.data = {};
            this.status = false;
            $("#modal-default").modal();
        },
        editData(event, row) {
            this.data = this.datas[row];
            this.status = true;
            $("#modal-default").modal();
        },
        deleteData(event, id) {
            Swal.fire({
                title: "Are you sure you want to delete this Data?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .post(`${actionUrl}/${id}`, { _method: "DELETE" })
                        .then((response) => {
                            $(event.target).parents("tr").remove();
                            Swal.fire("Data has been Deleted");
                        });
                }
            });
        },
        submittedForm(event, id) {
            const _this = this;
            var actionUrl = this.status ?
                `${this.actionUrl}/${id}` :
                this.actionUrl;
            var successMessage = this.status ?
                "Data has been Updated" :
                "Data has been Added";

            axios
                .post(actionUrl, new FormData($(event.target)[0]))
                .then(() => {
                    $("#modal-default").modal("hide");
                    _this.table.ajax.reload();
                    Swal.fire(successMessage);
                })
                .catch((error) => {
                    if (error.response) {
                        // get all error messages
                        var errorMessage = error.response.data.errors;
                        // extract each error then insert it into error box
                        var errorBox = "";
                        $.each(errorMessage, function(key, val) {
                            errorBox += `<p clas='text-danger'> ${val}</p> <br>`;
                        });

                        // Display an Error Messages
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            html: errorBox,
                        });
                    }
                });
        },
    },
});
