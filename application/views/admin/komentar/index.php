
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Komentar</h3>
        
      </div>
      <div class="box-body">
        <table id="table-data" class="table table-bordered table-striped" style="width:100%">
          <thead>
            <tr>
              <th style="width:3%" class="text-center">No</th>
              <th>Page</th>
              <th>Nama Pengomentar</th>
              <th>Isi Komentar</th>
              <th>Status</th>
              <th style='width:10%'>Action</th>
            </tr>
          </thead>
          <tbody id="list-data">
          
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var MyTable = $('#table-data').dataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false
  });

  function refresh() {
    MyTable = $('#table-data').dataTable();
  }

  showData();
  function showData() {
    $.get('<?php echo base_url('admin/komentar/search'); ?>', function(data) {
      MyTable.fnDestroy();
      $('#list-data').html(data);
      refresh();
    });
  }

  function editData(id) {
    location.href="<?=base_url()?>admin/komentar/edit_data/"+id;
  }
  function deleteData(id) {
    if (confirm('Apakah anda yakin ingin menghapus data ini ?')) {
      $.ajax({
          type    : "POST",
          url     : "<?=base_url()?>admin/komentar/delete_data",
          data    : {
              id : id
          },
          dataType : "json",
          success: function (res) {
              if(res.status == 'success') {
                  alert(res.message);
                  showData();
              }
          }
      });
    }
  }
</script>