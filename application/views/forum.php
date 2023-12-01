</header>
<section>
    <div class="container">
        <div>
            <br>
            <h2 class="forum-name">Forum</h2>
        </div>
        <?= $this->session->tempdata('status') ?>
        <?php if(!empty(validation_errors())): ?>
        <?= validation_errors() ?>
        <?php endif; ?>
        <br>
        <div class="add-btn">
            <a href="<?= base_url() ?>Forum/addNew"><button type="button">Create Topic</button></a>
        </div>
        <div class="topics-section">
            <ul>
            </ul>
        </div>
    </div>
</section>

<script>
    var topics = <?= $topics ?>;
    var container = document.querySelector('.topics-section ul');
    for(let topic of topics){
        var html = `
            <li class="topic">
                <div class="flex-container">
                    <div class="title-part">
                        <a href="<?= base_url() ?>Topic/getTopic/${topic.id}">
                            <h5 class="title">
                                ${topic.title}
                            </h5>
                        </a>
                    </div>
                    <div class="comment-part">
                        <span class="comment-count">
                            ${topic.count} comments
                        </span>
                    </div>
                    <div class="lastActive-part">
                        <span class="timestamp">
                            ${new Date(topic.lastActive).toLocaleString()}
                            </span>
                        <?php if($this->session->userdata('verified') == '2'): ?> 
                        <?php echo '<span><a href="'.base_url().'Topic/deleteTopic/${topic.id}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>' ?>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }
</script>
<!-- TODO check session role -->
<style>
*{
    box-sizing: border-box;
}

.add-btn{
    text-align: right;
	padding: 3px 10px;

}

.add-btn button{
    width: fit-content;
    border-radius: 10px;
    font-size: 0.875rem;
    padding: 5px 10px;
}

.flex-container{
    display: flex;
    overflow-wrap: anywhere;
}

.title-part{
    flex: 3 fit-content;
    padding: 10px;
    display: flex;
    align-items: center;
}

.comment-part{
    flex: 1 fit-content;
    text-align: right;
    padding: 10px;
    display: flex;
    justify-content: right;
    align-items: center;
}

.lastActive-part{
    flex: 1 fit-content;
    text-align: center;
	display: flex;
	column-gap: 20px;
	justify-content: center;
    padding: 10px;
    align-items: right;

}

.forum-name{
    padding: 5px 10px;
}


ul, li{
    list-style: none;
    padding: 0;
    margin: 5px;
}

a{
    text-decoration: none;
    color: black
}

a .title:hover{
    text-decoration: underline;
}

.topic{
    background-color: #ebf2fa;
    border-radius: 15px;
}

.comment-count{
    padding: 0;
    margin: 0;
}

</style>