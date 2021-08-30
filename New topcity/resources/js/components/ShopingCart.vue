<template>
    <section id="basket">
        <a @click="buttonIconClick"  href="#" class="buttons__shop-list shop-list js-modal" data-toggle="modal"
           data-target="#shoplist">
            <svg class="shop-list__image" fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="15px" height="15px"
                 viewBox="0 0 446.853 446.853" style="enable-background:new 0 0 446.853 446.853;" xml:space="preserve">
              <path d="M444.274,93.36c-2.558-3.666-6.674-5.932-11.145-6.123L155.942,75.289c-7.953-0.348-14.599,5.792-14.939,13.708 c-0.338,7.913,5.792,14.599,13.707,14.939l258.421,11.14L362.32,273.61H136.205L95.354,51.179 c-0.898-4.875-4.245-8.942-8.861-10.753L19.586,14.141c-7.374-2.887-15.695,0.735-18.591,8.1c-2.891,7.369,0.73,15.695,8.1,18.591 l59.491,23.371l41.572,226.335c1.253,6.804,7.183,11.746,14.104,11.746h6.896l-15.747,43.74c-1.318,3.664-0.775,7.733,1.468,10.916 c2.24,3.184,5.883,5.078,9.772,5.078h11.045c-6.844,7.617-11.045,17.646-11.045,28.675c0,23.718,19.299,43.012,43.012,43.012 s43.012-19.294,43.012-43.012c0-11.028-4.201-21.058-11.044-28.675h93.777c-6.847,7.617-11.047,17.646-11.047,28.675 c0,23.718,19.294,43.012,43.012,43.012c23.719,0,43.012-19.294,43.012-43.012c0-11.028-4.2-21.058-11.042-28.675h13.432 c6.6,0,11.948-5.349,11.948-11.947c0-6.6-5.349-11.948-11.948-11.948H143.651l12.902-35.843h216.221 c6.235,0,11.752-4.028,13.651-9.96l59.739-186.387C447.536,101.679,446.832,97.028,444.274,93.36z M169.664,409.814 c-10.543,0-19.117-8.573-19.117-19.116s8.574-19.117,19.117-19.117s19.116,8.574,19.116,19.117S180.207,409.814,169.664,409.814z M327.373,409.814c-10.543,0-19.116-8.573-19.116-19.116s8.573-19.117,19.116-19.117s19.116,8.574,19.116,19.117 S337.916,409.814,327.373,409.814z"/>
          </svg>
        </a>
        <span :class="{'basket__marker--hide' : this.basketData_count == 0 }" class="basket__marker">{{ this.basketData_count }}</span>
        <!-- Modal -->
        <div class="modal fade" id="shoplist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="shoplistModal">{{ this.translations_box.cart}}</h5>
                        <a href="#" class="login_form__close" data-dismiss="modal">

                            <svg fill="#8f8f8f" width="13px" version="1.1" xmlns="http://www.w3.org/2000/svg" height="13px" viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 64 64">
                                <path d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z"/>
                            </svg>

                        </a>
                    </div>
                    <div v-if="basketData_count == 0" class="modal-body">
                        <p class="modal-body__text">{{ this.translations_box.cart_empty}}</p>
                    </div>
                    <div v-else="" class="modal-body">
                        <div class="modal__param row">
                            <p class="col-lg-1 col-sm-12">{{ this.translations_box.product.photo}}</p>
                            <p class="col-lg-3 col-sm-12">{{ this.translations_box.product.name}}</p>
                            <p class="col-lg-3 col-sm-12">{{ this.translations_box.product.article}}</p>
                            <p class="col-lg-2 col-sm-12">{{ this.translations_box.product.count}}</p>
                            <p class="col-lg-1 col-sm-12">{{ this.translations_box.product.price}}</p>
                            <p class="col-lg-1 col-sm-12">{{ this.translations_box.product.total}}</p>
                        </div>
                        <div class="shopList__body">
                            <item-row v-for="(cartItem) in basketData" :key="cartItem.rowId"
                                      class="basket__item js-basket-item item row"
                                      :cartItem="cartItem"
                                      :recalculate="recalculate"
                                      :processDelete="processDelete"
                                      :translations = "translations_box.product"
                                      :ajax_url="ajax_url">
                            </item-row>
                        </div>

                    </div>
                    <div class="modal-footer modal__footer">
                        <div class="button__shopping-place">
                            <div class="button__shopping">
                                <a class="shopping__more more" href="/shop" ><p>{{ this.translations_box.button.continue_shopping}}</p>
                                    <img :src="this.url + '/img/svg/left-arrow.svg'" alt="save button">
                                </a>

                            </div>
                            <div v-if="basketData_count !== 0" class="button_place ">
                                <button @click="SwitchToZip" class="learn-more learn_more_btn"  data-toggle="modal">
                                    <div class="circle">
                                        <img :src="this.url + '/img/svg/right-arrow.svg'" alt="save button">
                                        <span class="icon arrow"></span>
                                    </div>
                                    <p style="width: 120px;" class="button-text btn_basket">{{ this.translations_box.button.add_to_ZIP}}</p>
                                </button>
                                <div class="modal fade" id="get-zip" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="popup__send-message modal-content">
                                            <div class="send-message">
                                                <h2 class="send-message__title">{{ this.translations_box.product.added_to_the_ZIP }}</h2>
                                            </div>
                                            <a href="#" class="send-message_form__close" data-dismiss="modal">
                                                <svg fill="#8f8f8f" width="13px" version="1.1" xmlns="http://www.w3.org/2000/svg" height="13px" viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 64 64">
                                                    <path d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="basketData_count !== 0" class="button__price-place">
                            <div class="button__price-text">
                                <p v-if="!isTotalShow" class="text">{{ this.translations_box.product.sum}}: <span class="price">{{total}} {{ this.translations_box.product.UAH }}</span></p>
                                <p v-else class="text">{{ this.translations_box.product.sum}}: <span class="price">{{ this.translations_box.product.on_request}}</span></p>
                            </div>
                            <div class="button_place fixed_button">
                                <button  @click="Buy" class="learn-more learn_more_btn">
                                    <div class="circle">
                                        <img :src="this.url + '/img/svg/right-arrow.svg'" alt="save button">
                                        <span class="icon arrow"></span>
                                    </div>
                                    <p class="button-text btn_basket">{{ this.translations_box.button.order}}</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    import $ from 'jquery';


    let timer = null;

    export default {
        props: ['ajax_url','count','translations'],
        data() {
            return {
                basketData: null,
                basketData_helper: {},
                basketData_count: 0,
                total: 0,
                isTotalShow: false,
                baseUrl: $('#base_url').attr("content"),
                url: $('#url').attr("content"),
                translations_box: JSON.parse(this.translations)

            }
        },
        beforeMount() {
          this.basketData_count = this.count;
          console.log(this.count);
        },
        computed: {
            timeCount:  function() {
                console.log(this);
                return (index)=>  this.basketData_helper[index]? this.basketData_helper[index].timeCount:'ssss';
            }
        },
        methods: {
            buttonIconClick() {
                console.log(this.ajax_url);
                $.get(this.ajax_url).then(
                    response => {
                        this.basketData = response.body;
                        this.basketData_count = response.count;
                        this.recalculate();
                        console.log(response);
                        console.log(this.basketData_count);
                    }
                )
            },
            addToCart(data, url ,type){
                let that = this;
                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    data: data,

                    success: function (response) {
                        console.log(response);
                        console.log(type);
                        if(type==='cart') {
                            that.basketData = response.body;
                            that.basketData_count = response.count;
                            that.recalculate();
                            $('#shoplist').modal('show');
                            //showCart

                        }
                        if(type==='zip') {
                            console.log('ADD TO ZIP');
                            // alert('ADD TO ZIP');
                            $('#modal_zip').modal('show');
                            //show success add to zip
                        }
                    },
                    error: function (data) {
                        console.log(data);

                    }
                });

            },
            showCart(){
                $.get(this.ajax_url).then(
                    response => {
                        this.basketData = response.body;
                        this.basketData_count = response.count;
                        this.recalculate();
                        console.log(response);
                        console.log(this.basketData_count);
                        console.log('showCart');
                    });
            },
            addZipToCart(url,data) {
                let that = this;
                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    data: data,

                    success: function (response) {
                        console.log(response);
                        that.basketData = response.body;
                        that.basketData_count = response.count;
                        that.recalculate();
                        $('#shoplist').modal('show');

                    },
                    error: function (response) {
                        alert(response);
                        console.log(response);

                    }
                });
            },
            recalculate() {
                this.isTotalShow = false;

                this.total = this.basketData.reduce( (prev, item) =>{
                    if ( item.price === 0 )this.isTotalShow = true;
                return prev + item.price * item.qty}, 0).toFixed(2);
                console.log('Recalculate ' + this.total);
            },
            processDelete(cartItem, domCardRow){
                    const {rowId} = cartItem;
                    console.log(rowId);
                    const index = this.basketData.indexOf(cartItem);
                    $.ajax({
                        url: `${this.ajax_url}/${rowId}`,
                        method: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    }).then( (response) => {
                        this.basketData_count = response.count;
                        $(domCardRow).slideUp(500, () => {this.basketData.splice(index, 1); this.recalculate(); });

                    });


            },
            Buy() {
                if (this.basketData_count > 0) {
                    window.location.replace(this.baseUrl + '/checkout');
                }
            },
            SwitchToZip() {
                $.ajax({
                    url: '/auth',
                    method: 'GET',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                }).then( (response) => {
                    console.log(response.auth)
                    if (response.auth){
                        let that = this;
                        let url = (this.baseUrl + '/cart/switchToZip');
                        let rowIds = $.map(this.basketData,function(obj) {
                            return obj.rowId;
                        });
                        $.ajax({
                            url: url,
                            method: 'POST',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            dataType: 'json',
                            data: {switchToZip: 'true'}
                        }).then( (response) => {
                            console.log(response);
                            that.basketData = 0;
                            that.basketData_count = 0;
                            console.log('ALARM');
                            window.location.replace(this.baseUrl + '/user-cabinet/your-zip');
                            // route to Ваші ЗІПи
                        });
                    }else{
                        $('#shoplist').modal('hide');
                        $('#exampleModalCenter').modal('show');
                    }
                });

            },
            Continue_shopping(event) {
                event.preventDefault();
                window.location.replace();
            },
            addToCartFromSpec(articles) {
                console.log('LOOOOOOL');
                console.log(articles);
                let url = this.ajax_url + '/addToCartFromSpec';
                console.log(url);
                let data = {
                    product_data:articles
                };
                $.ajax({
                    url: url,
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    data: data,
                    success: (response) => {
                        console.log(response);
                        this.basketData = response.body;
                        this.basketData_count = response.count;
                        this.recalculate();
                        $('#shoplist').modal('show');
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