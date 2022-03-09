var authorVue = new Vue({
        el: '#controller',
        data: {
            members: {},
            search: '',
            actionUrl,
            apiUrl,
            editStatus: false,
            members: {}
        },
        mounted: function() {
            this.get_members();
        },
        methods: {
            get_members() {
                const _this = this;
                $.ajax({
                    url: apiUrl,
                    method: 'GET',
                    success: function(data) {
                        _this.members = JSON.parse(data);
                    },
                    eror: function(eror) {
                        console.log(eror);
                    }
                })
            },
            addData() {
                this.data = {};
                this.editStatus = false;
                data $('#modalmadul').modal();
            },
            editData(members) {
                this.members = members;
                this.editStatus = true
                $('#modalmadul').modal();
            },
            deleteData(id) {
                Swal.fire({
                        title: "Are you sure you want to delete this member?",
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            axios.post(`${actionUrl}/${id}`, { _method: 'DELETE' })
                                .then(response => {
                                    $('#modal-book').modal('hide')
                                    Swal.fire("Book has been Deleted")
                                    this.members();
                                })
                        }
                    })
            },
            numberWithSpaces(num) {
                return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },
            submitform(event, id) {
                var actionUrl = this.editStatus ? `${this.actionUrl}/${id}` : this.actionUrl
                var successMessage = this.editStatus ? "Data has been Updated" : "Data has been Added"
                axios.post(actionUrl, new FormData($(event.target)[0]))
                    .then(() => {
                        $('#modalmadul').modal('hide')
                        Swal.fire(successMessage)
                        this.members();
                    })
                    .catch((error) => {
                        if (error.response) {
                            // get all error messages
                            let errorMessage = error.response.data.errors
                                // extract each error then insert it into error box
                            let errorBox = ''
                            $.each(errorMessage, function(key, val) {
                                    errorBox += `<p clas='text-danger'> ${val}</p> <br>`
                                })
                                // Display an Error Messages
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                html: errorBox,
                            })
                        }
                    })
            }
        },
        computed: {
            filteredList() {
                return this.members.filter(members => {
                    return members.title.toLowerCase().includes(this.search.toLowerCase())
                })
            }
        }
    }) <
    /script>
@endsection