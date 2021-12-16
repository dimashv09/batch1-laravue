const controller = new Vue({
    el: '#controller',
    data: {
        datas: [],
        data: {},
        actionUrl,
        apiUrl,
        status: false
    },
    mounted: function() {
        this.fetchDataTable()
    },
    methods: {
        fetchDataTable() {
            const _this = this
            _this.table = $('#dataTable').DataTable({
                ajax: {
                    url: _this.apiUrl,
                    type: 'GET'
                },
                columns
            }).on('xhr', function () {
                _this.datas = _this.table.ajax.json().data
            })
        },
        addData() {
            this.data = {};
            this.status = false
            $('#modal-default').modal()
        },
        editData(event, row) {
            this.data = this.datas[row];
            this.status = true
            $('#modal-default').modal()
        },
        deleteData(event, id) {
            if (confirm("Are you sure you want to delete this Data?")) {
                $(event.target).parents('tr').remove()
                axios.post(actionUrl + `/${id}`, {_method: 'DELETE'})
                    .then(() => alert("Data has been Deleted"))
            }
        },
        submittedForm(event, id) {
            const _this = this;
            let actionUrl = this.status ? `${this.actionUrl}/${id}`  : this.actionUrl

            axios.post(actionUrl, new FormData($(event.target)[0]))
                .then(() => {
                    $('#modal-default').modal('hide')
                    _this.table.ajax.reload()
                    alert("Data has been Updated")
                })
        }
    }
})
