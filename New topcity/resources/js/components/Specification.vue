<template>
    <section>
        <h2 class="specification-menu__title">{{ this.translations_box.specification_menu}}</h2>
        <div class="specification-menu__filter row">
            <div class="specification-menu_left-wrap col-xl-8 col-lg-8 col-md-8 col-sm-12">
                <span class="filter__text">{{ this.translations_box.sorting}}:</span>
                <button @click="Filter('date')" type="button" class="filter__button button">{{ this.translations_box.date}}</button>
                <button @click="Filter('name')" type="button" class="filter__button button">{{ this.translations_box.name}}</button>
                <button @click="Filter('content')" type="button" class="filter__button button">{{ this.translations_box.filling}}</button>
            </div>
            <div class="specification-menu_right-wrap col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <button @click="addNewSpecification" type="button" class="filter__create-btn">{{ this.translations_box.create_specification}}</button>
            </div>
        </div>
        <div class="specification-menu__accordion accordion" id="accordion">
            <specification-row
                    v-for="(item, index) in specificationData"
                    :key="item.id"
                    :nameFolder="item.name"
                    :dateCreate="item.created_at"
                    :indexSpec = "index"
                    :idRow="item.id"
                    :content="item.content"
                    :translate_spec="translations_box.specification"
                    @delete_spec="deleteSpecification"
                    @selectItem="slectItem"
                    @SwitchToArchiveAction="SwitchToArchiveParent"
                    :ref = "'spec'+item.id"
            ></specification-row>
        </div>
        <h2 class="archive__title">
            <svg class="file-item item" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60"
                 xml:space="preserve"><path
                         d="M42.5,22h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S43.052,22,42.5,22z"/>
                <path d="M17.5,16h10c0.552,0,1-0.447,1-1s-0.448-1-1-1h-10c-0.552,0-1,0.447-1,1S16.948,16,17.5,16z"/>
                <path d="M42.5,30h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S43.052,30,42.5,30z"/>
                <path d="M42.5,38h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S43.052,38,42.5,38z"/>
                <path d="M42.5,46h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S43.052,46,42.5,46z"/>
                <path d="M38.914,0H6.5v60h47V14.586L38.914,0z M39.5,3.414L50.086,14H39.5V3.414z M8.5,58V2h29v14h14v42H8.5z"/> </svg>
            {{ this.translations_box.archive }}
        </h2>
        <div class="archive">
            <div class="archive__accordion" id="accordionArchive">
                <specification-archive
                        v-for="(item, index) in dataArchive"
                        :key="item.id"
                        :indexArchive = "index"
                        :nameFolder="item.name"
                        :dateCreate="item.created_at"
                        :idRow="item.id"
                        :itemData="item.content"
                        :translate_spec="translations_box.specification"
                        @SwitchToSpecificationAction="SwitchToSpecificationParent"
                ></specification-archive>
            </div>
        </div>
        <div class="order-numb__modal modal fade" id="articleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ this.translations_modal.enter_item_article }}</h5>
                        <a href="#" class="login_form__close" data-dismiss="modal">
                            <svg fill="#8f8f8f" width="13px" version="1.1" xmlns="http://www.w3.org/2000/svg" height="13px" viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 64 64">
                                <path d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z"/>
                            </svg>
                        </a>
                    </div>
                    <div class="modal-body">

                        <div class="modal-content js-gear-modal-content" style="display: inline-block" >
                            <div class="modal-content__result">
                                <input class="js-modal-content__input" type="text" maxlength="1" onkeyup="jumpFocus(this)"  required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div id="login_button" class="basket__button button_place">
                            <button @click="addArticle($event)" class="learn-more learn-more_btn">
                                <div class="circle">
                                    <img class="lazyImage" src="/img/svg/right-arrow.svg" alt="save button">
                                </div>
                                <p class="button-text">{{ this.translations_modal.add }}</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        props: ['translations','translate_modal'],
        data() {
            return {
                specificationData: [],
                modal_product_id: null,
                modal_article: null,
                modal_spec_id: null,
                dataArchive: [],
                translations_box: JSON.parse(this.translations),
                translations_modal:  JSON.parse(this.translate_modal),
            }
        },
        beforeMount() {
            $.ajax({
                type: "GET",
                url: 'specifications',

                success:  (response) => {
                    this.specificationData = response.specification_menus;
                    this.dataArchive = response.archive;
                    console.log(response.archive);
                    console.log(response.specification_menus);

                },
                error: function (response) {
                    alert('ERROR');
                    console.log(response);

                }
            });
        },
        methods: {
            slectItem (article,product_id,spec_id) {
                this.modal_article = article;
                this.modal_product_id = product_id;
                this.modal_spec_id = spec_id;
                console.log('ALERRRRRRRRR',spec_id);
            },
            addArticle(e) {

                let arrInput = [];
                $('.js-modal-content__input').each(function (index) {
                    if ($(this).val() == '') {
                        $(this).css('box-shadow', '0px 0px 3px 1px #f50057');
                        arrInput.push($(this));
                    } else {
                        $(this).css('box-shadow', 'none');
                    }
                });
                if (arrInput.length == 0) {
                    $('.order-numb__modal').modal('hide');
                    let article =  this.modal_article;
                    let arr = [];
                    $('.modal-content__result').children().each(function (index) {
                        arr.push($(this).val())
                    });
                    let tex = article.split('');
                    let l = tex.length;
                    let arrL = 0;
                    for (let i = 0; i <= l; i++) {
                        if (tex[i] == '.') {
                            tex[i] = arr[arrL++];
                        }
                    }
                    let article_new = tex.join('');
                    let url = 'specification-menu/addToCart';
                    let data = {
                        product_id: this.modal_product_id,
                        article_new: article_new,
                        specification_menu_id: this.modal_spec_id
                    };
                    console.log(this.modal_spec_id);
                    $.ajax({
                        type: "POST",
                        url: 'specification-menu/add-specification',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        dataType: 'json',
                        data: data,

                        success:  (response) => {
                            console.log(response);
                            this.$refs['spec'+data.specification_menu_id][0].addSpecItem(response.product);

                        },
                        error: function (response) {
                            if (response.responseJSON.duplicate_value){
                                alert('DUPLICATE!');
                            } else {
                                alert(response);

                            }
                            console.log(response);

                        }
                    });
                }
            },
            addNewSpecification() {

                $.ajax({
                    type: "POST",
                    url: 'specification-menu/add-menu',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    data: {name:'New Spec'},

                    success:  (response) => {
                        console.log(response.specification_menu);
                        this.specificationData.push(response.specification_menu);
                    },
                    error: function (response) {
                        console.log(response);

                    }
                });
            },
            deleteSpecification(id) {
                console.log(id);
                console.log('APRENT');
                $.ajax({
                    type: "DELETE",
                    url: 'specification-menu/'+ id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    data: {query:this.addName},

                    success:  (response) => {
                        this.specificationData = response.specification_menus;
                    },
                    error: function (response) {
                        alert("ERROR");
                        console.log(response);

                    }
                });
            },
            SwitchToArchiveParent(archive,index) {
                console.log(archive);
                console.log(index);
                 this.specificationData.splice(index,1);
                 this.dataArchive.push(archive);

            },
            SwitchToSpecificationParent(archive,index) {
                this.dataArchive.splice(index,1);
                this.specificationData.push(archive);

            },
            Filter(filter) {
                console.log(filter);

                $.ajax({
                    type: "GET",
                    url: 'specifications?sort='+filter,

                    success:  (response) => {
                        this.specificationData = response.specification_menus;
                        this.dataArchive = response.archive;
                        console.log(response.archive);
                        console.log(response.specification_menus);

                    },
                    error: function (response) {
                        alert('ERROR');
                        console.log(response);

                    }
                });
            }
        },

    }
</script>