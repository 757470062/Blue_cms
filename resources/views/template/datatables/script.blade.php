<script type="text/javascript">
    $(function() {
        window.table_id = '#' + '{{ $datatable_id }}';

        window.table = $(table_id).DataTable({
            @if (!$search)
            language: {
                url: "/js/Chinese.json"
            }
            @endif
        });

        @if ($search)
            window.table_h = $(table_id + ' thead th');
        window.table_f = $(table_id + ' tfoot th');
        @endif
    });
</script>