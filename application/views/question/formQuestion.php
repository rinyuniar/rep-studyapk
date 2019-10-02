<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-6">
             <div class="card"> 
                <div class="card-body"> 
                    <form action="<?=base_url("modul/QuestionAdd/proses")?>" method="post">
                        <h3>Tambah Pertanyaan</h3>
                        <div class="form-group">
                            <label for="">Tipe</label>
                            <select class="form-control" name="type" id="" required>
                                <option value="text">Text</option>
                                <option value="paragraph">Paragraph</option>
                                <option value="select">Select</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Pertanyaan</label>
                            <input type="text" name="the_question"  class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Pilihan</label>
                            <textarea name="options" id="" cols="50" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="radio" name="status" value="active" required>Active
                            <input type="radio" name="status" value="archived" required>Archived
                        </div>
                        <div class="form-group">
                            <label for="">Ordering</label>
                            <input type="text" name="ordering"  class="form-control" required>
                        </div>
                        <input type="submit" value="Proses" class="btn btn-primary btn-block mt-2"/>
                </form>
                </div>
            </div>
         </div>
    </div>
</div>

