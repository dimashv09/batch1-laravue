<script type="text/javascript">
    $(function() {
        $("#datatable").DataTable();
    })
</script>
<script type="text/javascript">
    var controller = new Vue({
        el: '#controller',
        data: {
            data: {},
            actionUrl: "{{ url('publishers') }}"

        },

        methods: {
            addData() {
                this.data = {};
                this.actionUrl = "{{ url('publishers') }}";
                editStatus: false
                $('#modal-default').modal();
            },
            editData(data) {
                this.data = data;
                this.actionUrl = "{{ url('publishers') }}" + '/' + data.id;
                editStatus: true
                $('#modal-default').modal();
            },
            deleteData(id) {
                this.actionUrl = "{{ url('publishers') }}" + '/' + id;
                if (confirm("Are you sure ?")) {
                    axios.post(this.actionUrl, {
                        _method: 'DELETE'
                    }).then(response => {
                        location.reload();
                    })
                }

            }
        }
    });
</script>