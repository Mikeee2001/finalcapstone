<span class="badge {{ $job->status === 'active' ? 'bg-success' : 'bg-danger' }}">
    {{ ucfirst($job->status) }}
</span>

<button class="btn btn-sm {{ $job->status === 'active' ? 'btn-outline-danger' : 'btn-outline-success' }} status-btn ms-2"
    data-url="{{ route('employer.toggle-job-status', $job->id) }}">
    {{ $job->status === 'active' ? 'Deactivate' : 'Activate' }}
</button>

<script>
    $(document).on('click', '.status-btn', function() {
        let url = $(this).data('url');
        let table = $('#jobsTable').DataTable();

        // Show loader
        $('#tableLoader').fadeIn();

        fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                $('#tableLoader').fadeOut();

                if (data.success) {
                    table.ajax.reload(null, false); // reload table without resetting pagination

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: `Job status updated to ${data.status}`,
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true
                    });
                } else {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: data.error || 'Something went wrong!',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true
                    });
                }
            })
            .catch(() => {
                $('#tableLoader').fadeOut();
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: 'Unexpected error occurred.',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            });
    });
</script>
