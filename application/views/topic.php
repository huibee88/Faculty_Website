</header>
<div class="container">
    <a href="<?= base_url() ?>/Forum">
        <h2>Forum</h2>
    </a>

    <?= $this->session->tempdata('status') ?>
    <?php if(!empty(validation_errors())): ?>
    <?= validation_errors() ?>
    <?php endif; ?>

    <div class="add-btn">
        <a href="#comment-part"><button type="button">Reply</button></a>
    </div>
        <div class="topics-section">
            <div class="title"></div>
            <div class="wrapper">
   
            </div>
        </div>
        <div class="add-comment" id="comment-part">
            <form method="post">
                <textarea name=comment></textarea> 
                <br>
                <div class="add-btn bottom">
                    <button type="submit">Add comment</button>
                </div>
            </form>
        </div>
</div>
<script>
    var topic = <?= $topic ?>;
    document.querySelector('.title').innerText = topic.title;
    document.querySelector('.add-comment form').setAttribute("action", "<?= base_url() ?>Topic/addComment/" + topic.id); 
    console.log(topic);
    var container = document.querySelector('.wrapper');
    author = topic.author;
    for(let comment of topic.comments){
        var optag = '';
        if(comment.author == author){
            optag = '<span class="op-tag">&nbsp;OP</span>';
        }
        var html = `
                <div class="comment-header header-grid-item">${new Date(comment.date).toLocaleString()}</div>
                <div class="user">
                    <div class="username">
                        ${comment.user}
                        ${optag}
                    </div>
                    <div class="userPic">
                        <img src="data:image/jpg;base64,${comment.profilePic}">
                    </div>
                </div>
                <div class="content">
                    ${comment.content}
                </div>
            `;
        container.insertAdjacentHTML('beforeend', html);
    }
</script>

<style>
*{
    box-sizing: border-box;
}

.topics-section {
	padding: 5px;
	background: #CFCEFF;
	border-radius: 2px;
}

.title{
    font-weight: 500;
    font-size: 1.1rem;
}

.wrapper{
    display: grid;
    grid-template-columns: 1fr 4fr;
    grid-auto-rows: 25px minmax(150px, auto);
}


.header-grid-item{
    grid-column: 1 / span 2;
}

.comment-header {
	font-style: italic;
	font-weight: 300;
	text-align: right;
	border: 1px solid white;
	background: #CEE5FF;
	padding-right: 2px;
}

.user {
	text-align: center;
	border-left: 1px solid white;
	border-right: 1px solid white;
	background: #ebf2fa;
}

.username {
    font-weight: 450;
}

.user img{
    height: 100px;
    max-width: 100px;
    max-height: 100px;
}

.op-tag {
    font-size: 0.9rem;
    font-weight: 450;
    color: #0058FF;
}

.content {
	border-right: 1px solid white;
	background: #ecf5ff;
    padding: 5px 8px;
}

.add-comment{
    padding: 10px 20px;
    text-align: center;
}

.add-comment form{
    border: none;
}

.add-comment textarea{
    width: 60%;
    height: 100px;
    resize: none;
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

.bottom{
    text-align: center;
}

a:hover{
    font-size: 1rem;
}

</style>