<script>
    $(document).ready(function () {
        $('.delete').on('click', function (e) {
            e.preventDefault();
            var form = $(this).closest('form');

            Swal.fire({
                title: "آیا مطمئن هستید؟",
                text: "این عملیات قابل بازگشت نیست!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "بله، حذف شود!",
                cancelButtonText: "لغو",
                dangerMode: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
