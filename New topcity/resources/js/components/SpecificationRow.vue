<template>
    <div class="accordion__card card border-active">
            <div class="card__header card-header row" id="headingOne">
                <div class="col-1">
                    <button class="folder-item item" data-toggle="collapse" :data-target="'#collapse' + idRow"
                            aria-expanded="true" :aria-controls="'collapse' + idRow">
                        <svg class="folder-item__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                             width="31px" height="25px" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 60 60" xml:space="preserve">
                            <path d="M57.49,21.5H55v-9H26.515l-5-7H2.732C1.226,5.5,0,6.726,0,8.232v43.687l0.006,0c-0.005,0.563,0.17,1.114,0.522,1.575 C1.018,54.134,1.76,54.5,2.565,54.5h44.759c1.156,0,2.174-0.779,2.45-1.813L60,24.649v-0.177C60,22.75,58.944,21.5,57.49,21.5z M53,14.5v7h-8v-3c0-0.553-0.448-1-1-1s-1,0.447-1,1v3h-5v-3c0-0.553-0.448-1-1-1s-1,0.447-1,1v3h-5v-3c0-0.553-0.448-1-1-1 s-1,0.447-1,1v3h-5v-3c0-0.553-0.448-1-1-1s-1,0.447-1,1v3h-5v-3c0-0.553-0.448-1-1-1s-1,0.447-1,1v3h-2.269 c-0.143,0-0.284,0.012-0.422,0.035c-0.974,0.162-1.786,0.872-2.028,1.778l-0.317,0.87L5,37.793V20.5h6v-6h16.943H53z M6.414,18.5 L9,15.914V18.5H6.414z M2,8.232C2,7.828,2.329,7.5,2.732,7.5h17.753l3.571,5H9.586L3,19.086v24.085l-1,2.728V8.232z M47.869,52.083 c-0.066,0.245-0.291,0.417-0.545,0.417H2.565c-0.243,0-0.385-0.139-0.448-0.222c-0.063-0.082-0.16-0.256-0.123-0.408L3,49.112v0.001 l9.16-25.114l0.026-0.082c0.066-0.245,0.291-0.417,0.545-0.417H55h2.49c0.38,0,0.477,0.546,0.502,0.819L47.869,52.083z"/>
                        </svg>
                    </button>
                </div>
                <div class="col-4">
                    <p class="product-items item">
                        {{ specNameFolder }} <span>({{ itemsData.length }} {{ translate_spec.piece }})</span>
                        <input @blur="acceptChanges(idRow)" v-show="changeMode" type="text" :id="'nameFolder' + idRow"
                               v-model="specNameFolder" maxlength="13">
                    </p>
                </div>
                <div class="dateCreate col-xl-2 col-lg-2 col-md-2">
                    <p class="date-item item">{{ dateCreate }}</p>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-2 col-3">
                    <p class="day-item item">
                        <a @click="addToCart" href="#">{{ translate_spec.buy }}</a>
                    </p>
                </div>
                <div class="card__tools col-2">
                    <button class="file-item item" @click="SwitchToArchive(idRow,indexSpec)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17px" height="20px"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60"
                             xml:space="preserve">
                            <path d="M42.5,22h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S43.052,22,42.5,22z"/>
                            <path d="M17.5,16h10c0.552,0,1-0.447,1-1s-0.448-1-1-1h-10c-0.552,0-1,0.447-1,1S16.948,16,17.5,16z"/>
                            <path d="M42.5,30h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S43.052,30,42.5,30z"/>
                            <path d="M42.5,38h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S43.052,38,42.5,38z"/>
                            <path d="M42.5,46h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S43.052,46,42.5,46z"/>
                            <path d="M38.914,0H6.5v60h47V14.586L38.914,0z M39.5,3.414L50.086,14H39.5V3.414z M8.5,58V2h29v14h14v42H8.5z"/>
                        </svg>
                    </button>
                    <button @click="changeName" class="edit-item item">
                        <svg viewBox="0 0 476.76426 476" width="20px" height="20px" xmlns="http://www.w3.org/2000/svg">
                            <path d="m451.023438 26.117188c-34.386719-34.3125-90.058594-34.3125-124.449219 0v.046874l-285.582031 285.550782c-.648438.683594-1.171876 1.472656-1.542969 2.335937-.101563.214844-.195313.433594-.273438.65625-.097656.21875-.1875.4375-.261719.664063l-38.65625 151.761718c-.714843 2.742188.082032 5.660157 2.085938 7.664063s4.921875 2.796875 7.664062 2.085937l151.753907-38.640624c.230469-.0625.429687-.183594.65625-.261719.230469-.078125.457031-.171875.679687-.273438.859375-.371093 1.648438-.894531 2.328125-1.542969l285.542969-285.558593.054688-.042969c34.320312-34.382812 34.320312-90.0625 0-124.445312zm-11.3125 11.308593c25.886718 25.949219 28.1875 67.183594 5.351562 95.851563l-101.191406-101.203125c28.664062-22.835938 69.898437-20.53125 95.839844 5.351562zm-107.472657 5.707031 101.808594 101.757813-28.679687 28.6875-101.808594-101.804687zm-303.445312 376.800782c12.628906 5.671875 22.742187 15.78125 28.414062 28.414062l-38.117187 9.703125zm44 24.421875c-7.367188-18.199219-21.800781-32.632813-40-40l18.144531-71.382813 93.230469 93.238282zm86.976562-25.199219-101.808593-101.785156 234.289062-234.289063 101.804688 101.808594zm0 0"/>
                        </svg>
                    </button>
                    <button @click="deleteSpecification(idRow)" class="delete__button">
                        <svg fill="#02a3d4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="20px" height="20px" viewBox="0 0 482.428 482.429"
                             style="enable-background:new 0 0 482.428 482.429;"
                             xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M381.163,57.799h-75.094C302.323,25.316,274.686,0,241.214,0c-33.471,0-61.104,25.315-64.85,57.799h-75.098
                                        c-30.39,0-55.111,24.728-55.111,55.117v2.828c0,23.223,14.46,43.1,34.83,51.199v260.369c0,30.39,24.724,55.117,55.112,55.117
                                        h210.236c30.389,0,55.111-24.729,55.111-55.117V166.944c20.369-8.1,34.83-27.977,34.83-51.199v-2.828
                                        C436.274,82.527,411.551,57.799,381.163,57.799z M241.214,26.139c19.037,0,34.927,13.645,38.443,31.66h-76.879
                                        C206.293,39.783,222.184,26.139,241.214,26.139z M375.305,427.312c0,15.978-13,28.979-28.973,28.979H136.096
                                        c-15.973,0-28.973-13.002-28.973-28.979V170.861h268.182V427.312z M410.135,115.744c0,15.978-13,28.979-28.973,28.979H101.266
                                        c-15.973,0-28.973-13.001-28.973-28.979v-2.828c0-15.978,13-28.979,28.973-28.979h279.897c15.973,0,28.973,13.001,28.973,28.979
                                        V115.744z"/>
                                    <path d="M171.144,422.863c7.218,0,13.069-5.853,13.069-13.068V262.641c0-7.216-5.852-13.07-13.069-13.07
                                        c-7.217,0-13.069,5.854-13.069,13.07v147.154C158.074,417.012,163.926,422.863,171.144,422.863z"/>
                                    <path d="M241.214,422.863c7.218,0,13.07-5.853,13.07-13.068V262.641c0-7.216-5.854-13.07-13.07-13.07
                                        c-7.217,0-13.069,5.854-13.069,13.07v147.154C228.145,417.012,233.996,422.863,241.214,422.863z"/>
                                    <path d="M311.284,422.863c7.217,0,13.068-5.853,13.068-13.068V262.641c0-7.216-5.852-13.07-13.068-13.07
                                        c-7.219,0-13.07,5.854-13.07,13.07v147.154C298.213,417.012,304.067,422.863,311.284,422.863z"/>
                                </g>
                            </g>
                        </svg>
                    </button>
                </div>
                <div class="col-1">
                    <button class="button-item item collapsed" data-toggle="collapse" :data-target="'#collapse' + idRow"
                            aria-expanded="true" :aria-controls="'collapse' + idRow">
                        <svg class="button-item__img" xmlns="http://www.w3.org/2000/svg" width="11" height="5"
                             viewBox="0 0 11 5">
                            <path d="M0-.001l5.5 5 5.5-5z"/>
                        </svg>
                    </button>
                </div>

            </div>

            <div :id="'collapse' + idRow " class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                <!--show-->
                <div class="card-body">

                    <row-item
                            v-for="(item, index) in itemsData"
                            :key="idRow + 'row' + item.article"
                            :itemName="item.name"
                            :itemNumber="item.article"
                            :id="idRow + 'row' + item.article"
                            :category_id="item.category_id"
                            :product_id="item.id"
                            :specification_id="idRow"
                            @delete="deleteSpecificationItem"
                            :checkItems="checkItems"
                    ></row-item>

                    <div class="block__addItem">
                        <input @keyup="searchArticle()" class="addItem" type="text" :placeholder="translate_spec.add_product"
                               v-model="addName">
                        <button @click="addItem" class="addItem__button" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                <path fill="#fff" d="M7 0h1v15H7z"/>
                                <path fill="#fff" d="M0 7h15v1H0z"/>
                            </svg>
                        </button>
                        <ul v-if="addName !== ''" class="addItem__list">
                            <li
                                    @click="selectItem($event)"
                                    v-for="(item, index) in addItemData.products"
                                    :id="item.id"
                                    class="list__item"
                                    data-target="#articleModal"
                            >{{item.article}}
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
</template>
<script>
    import $ from 'jquery';

    export default {
        props: ['nameFolder', 'dateCreate', 'idRow', 'content', 'indexSpec','translate_spec'],
        data() {
            return {
                changeMode: false,
                name: 'New folder',
                addItemData: [],
                specNameFolder: this.nameFolder,
                oldName: '',
                productId: null,
                itemsData: this.content,
                addName: '',

                checkItems: [],
                searchBox: false,
                itemsCount: null
            }
        },
        beforeMount() {

        },
        methods: {
            addSpecItem(product) {
                this.itemsData.push(product);
                this.addName = '';
            },
            changeName() {
                this.changeMode = !this.changeMode;
                this.oldName = this.specNameFolder;
            },
            acceptChanges(id) {
                this.changeMode = !this.changeMode;
                $.ajax({
                    type: "PATCH",
                    url: 'specification-menu/' + id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    data: {name: this.specNameFolder},

                    success: (response) => {
                        console.log(response);
                        if (!response.success) {
                            this.specNameFolder = this.oldName;
                        }
                    },
                    error: function (response) {
                        alert("ERROR");
                        console.log(response);

                    }
                });

            },
            addItem() {
                if(this.addName == "") {
                    $('.addItem').css('box-shadow', 'rgb(245, 0, 87) 0px 0px 3px 1px');
                } else {
                    $('.addItem').css('box-shadow', 'none');
                    $.ajax({
                        type: "POST",
                        url: 'specification-menu/add-specification',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        dataType: 'json',
                        data: {specification_menu_id: this.idRow, product_id: this.productId},

                        success: (response) => {
                            console.log(response);
                            this.itemsData.push(response.product);
                            this.addName = '';
                            console.log($.type(response.product));
                        },
                        error: (response) => {
                            if (response.responseJSON.duplicate_value){
                                console.log(this.translate_spec);
                                alert(this.translate_spec.duplicate);
                            } else {
                                alert(response);

                            }
                            console.log(response);
                            // alert("ERROR");


                        }
                    });
                }

            },
            searchArticle() {
                $.ajax({
                    type: "POST",
                    url: 'specification-menu/search',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    data: {query: this.addName},

                    success: (response) => {
                        this.addItemData = response;
                        this.searchBox = true;
                    },
                    error: function (response) {
                        console.log(response);

                    }
                });

            },
            selectItem(event) {
                $('.addItem').css('box-shadow', 'none');
                let val = $(event.target).text();
                console.log(val);
                let symbol = val.split('');
                let article_string = val.split('');
                let l = symbol.length;
                console.log(symbol);
                for (let i = 0; i <= l; i++) {
                    if (symbol[i] == '.') {
                        symbol[i] = '<input class="modal-content__input  js-modal-content__input" type="text" maxlength="1" onkeyup="jumpFocus(this)"  required>';
                    }
                }
                let modal = $('.modal-content__result');
                modal.html(symbol);
                this.addName = $(event.target).text();
                this.productId = event.target.id;
                console.log($.inArray('.',symbol));
                if($.inArray('.',article_string) !== -1)
                {
                    $('#articleModal').modal('show');
                    this.$emit('selectItem', this.addName, this.productId, this.idRow);
                    this.addName = '';
                }


                console.log(this.addName, this.productId);
            },
            deleteSpecificationItem(item_id, id) {
                $.ajax({
                    type: "DELETE",
                    url: 'specification-menu/' + id + '/item/' + item_id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                    success: (response) => {
                        this.itemsData = response.specification_items;
                    },
                    error: function (response) {
                        alert("ERROR");
                        console.log(response);

                    }
                });
            },
            deleteSpecification(id) {
                this.$emit('delete_spec', id);
            },
            addToCart(e) {
                e.preventDefault();
                let check = [];
                console.log(this.checkItems);
                for (let flag in this.checkItems) {
                    if (this.checkItems[flag] == true) {
                        let articleAndId = flag.split(',');
                        var arr = {
                            article: articleAndId[0],
                            id: parseInt(articleAndId[1]),
                            category_id: parseInt(articleAndId[2])
                        };
                        check.push(arr);

                    }
                }

                console.log(check);
                if(check.length !== 0){
                    VueApp.$refs.cart.addToCartFromSpec(check);
                }

            },
            SwitchToArchive(id, index) {
                $.ajax({
                    type: "POST",
                    url: 'specification-menu/switchToArchive/' + id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                    success: (response) => {
                        console.log(response);
                        this.$emit('SwitchToArchiveAction', response.specification, index);
                    },
                    error: function (response) {
                        alert("ERROR");
                        console.log(response);

                    }
                });
            }
        }
    }
</script>