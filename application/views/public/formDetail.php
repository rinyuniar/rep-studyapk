<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
             <div class="card"> 
                <div class="card-body"> 
                        <table>
                            <thead>
                                <h2>Detail User</h2>
                            </thead>
                            <tbody>
                            
                                <tr><p>ID : <?=$detail['id_user']?></p></tr>
                                <tr><p>Nama Lengkap : <?=$detail['nama_lengkap']?></p></tr>
                                <tr><p>Email : <?=$detail['email']?></p></tr>
                                <?php foreach($answer as $row): ?>
                                    <tr>
                                        <p>
                                            <strong>
                                                <?=$question[$row['question_id']]['the_question']?>
                                            </strong>
                                        </p>
                                    </tr>
                                    <tr>
                                        <p><?=$row['the_answer']?></p>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>