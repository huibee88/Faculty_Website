</header>

<div class="container">
    <a href="<?= base_url() ?>/Forum">
        <button class="back-btn btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back</button>
    </a>
    <form method="post" action="<?= base_url() ?>Topic/addTopic">
        <label for="title">Title</label>
        <input name="title" type="text" required>
        <label for="content">Content</label>
        <br>
        <textarea name="content" required></textarea>
        <div>
            <button class="create-btn btn" type="submit">Create</button>
        </div>
    </form>
</div>

<style>
*{
    box-sizing: border-box;
}

form{
    border: none;
}

textarea{
    resize: none;
    width: 100%;
    height: 200px;
}

form div{
    display: flex;
    justify-content: right;
}

.back-btn{
    width: fit-content;
    border-radius: 5px;
}

.create-btn{
    width: fit-content;
    border-radius: 5px;
}
</style>