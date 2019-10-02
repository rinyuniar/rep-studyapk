<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
             <div class="card"> 
                <div class="card-body"> 
                    <form action="<?=base_url("public/form/proses")?>" method="post">
                        <h3>Registrasi</h3>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email"  class="form-control" required>
                        </div>

                        <?php foreach($pertanyaan as $row):?>
                            <label for=""><?=$row['the_question']?></label>
                            <select class="form-control" name="question[<?=$row['question_id']?>]" id="">
                                <?php foreach($row['option_array'] as $row):?>
                                <option value="<?=$row?>"><?=$row?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php endforeach; ?>
                        
                        <input type="submit" value="Proses" class="btn btn-primary btn-block mt-2"/>
                </form>
                </div>
            </div>
         </div>
    </div>
</div>

