<style>
    /* .rate {

        border-bottom-right-radius: 12px;
        border-bottom-left-radius: 12px;

    } */



    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: left;

        /* //////// */
        /* display: flex; */
        /* justify-content: left; */
        /* align-items: flex-start; */
        /* flex-wrap: wrap; */
        /* flex-direction: row-reverse; */
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 1em;
        font-size: 30px;
        font-weight: 300;
        color: #FFD600;
        cursor: pointer
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }
</style>

<!-- <div class="container d-flex justify-content-center mt-5"> -->
<div class="form-group">
    <div class="rate">
        <h6 class="">Rate This product:</h6>
        <div class="rating">
            <input type="radio" name="rating" value="5" id="rate5">
            <label for="rate5">☆</label>
            <input type="radio" name="rating" value="4" id="rate4">
            <label for="rate4">☆</label>
            <input type="radio" name="rating" value="3" id="rate3">
            <label for="rate3">☆</label>
            <input type="radio" name="rating" value="2" id="rate2">
            <label for="rate2">☆</label>
            <input type="radio" title="very bad" name="rating" value="1" id="rate1">
            <label for="rate1">☆</label>
        </div>
    </div>
</div>
<!-- </div> -->


<script>

</script>