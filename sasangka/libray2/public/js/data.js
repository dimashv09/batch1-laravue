var authorVue = new Vue({
            el: "#controller",
            data: {
                dataList: [],
                data: {},
                actionUrl,
                apiUrl,
                editStatus: false
            },
            mounted() {
                this.datatable();
            },
            methods: {
                datatable() {
                    const _this = this;
                    _this.table = $('#datatable').DataTable({
                        ajax: {
                            url: this.apiUrl,
                            type: 'GET'
                        },
                        columns,
                    }).on('xhr', function() {
                        _this.dataList = _this.table.ajax.json().data;
                    })
                },
                addData() {
                    this.data = []
                    this.editStatus = false
                    $('#modal').modal();
                },
                editData(event, row) {
                    this.data = this.dataList[row]
                    this.editStatus = true
                    $('#modal').modal();
                },
                deleteData(event, id) {
                    if (confirm('Are you sure?')) {
                        $(event.target).parents('tr').remove();
                        axios.post(this.actionUrl + '/' + id, { _method: 'DELETE' }).then(response => {
                                    location.reload();
                                }
                            },
                            submitForm(event, id) {
                                event.preventDefault(;)
                                const _this = this
                                var url = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id
                                axios.post(url, new FormData($(event.target)[0])).then(response => {
                                    $('#modal').modal('hide')
                                    _this.table.ajax.reload();
                                })
                            }
                    }
                }) <
            /script>