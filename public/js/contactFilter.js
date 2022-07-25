$(document).ready(function () {
    $('#company_filter_id').on('change', function (e) {
        const companyId = this.value || this.options[this.selectedIndex].value;
        window.location.href = window.location.href.split('?')[0] + (companyId ? '?company_id=' + companyId : '');
    });

    $('.btn-delete').on('click', function (e) {
        e.preventDefault();
        if (confirm('Are you sure?')) {
            console.log('now delete contact');
            const action = this.getAttribute('href');
            const form = document.getElementById('form-delete');
            console.log(form);
            form.setAttribute('action', action);
            form.submit();
            // console.log('action: ' + action);
            // $('#form-delete').attr('action', action);
        }
    });

    $('#btn-clear').on('click', function () {
        $('#search').val('');
        $("#company_filter_id").val($("#company_filter_id option:first").val());
        window.location.href = window.location.href.split('?')[0];
    });
});

function toggleClearButton() {
    const query = location.search;
    const pattern = /[?&]search=/;
    const button = document.getElementById('btn-clear');

    if (pattern.test(query)) {
        button.style.display = 'block';
    } else {
        button.style.display = 'none';
    }
}

toggleClearButton();