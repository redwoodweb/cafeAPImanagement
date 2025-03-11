<?php
$data = '{
    "shop_no": 1,
    "request": {
        "display": "T",
        "selling": "T",
        "product_condition": "U",
        "product_used_month": 2,
        "add_category_no": [
            {
                "category_no": 27,
                "recommend": "F",
                "new": "T"
            },
            {
                "category_no": 28,
                "recommend": "T",
                "new": "F"
            }
        ],
        "delete_category_no": [
            27,
            45
        ],
        "custom_product_code": "",
        "product_name": "iPhone X",
        "eng_product_name": "iPhone Ten",
        "supply_product_name": "iphone A1865 fdd lte",
        "internal_product_name": "Sample Internal product name",
        "model_name": "A1865",
        "price": "11000.00",
        "retail_price": "0.00",
        "supply_price": "9000.00",
        "soldout_message": "Sold out",
        "use_naverpay": "T",
        "naverpay_type": "C",
        "use_kakaopay": "T",
        "image_upload_type": "A",
        "detail_image": "/web/product/big/201511/30_shop1_638611.jpg",
        "manufacturer_code": "M0000000",
        "supplier_code": "S0000000",
        "brand_code": "B0000000",
        "trend_code": "T0000000",
        "product_weight": "1.00",
        "expiration_date": {
            "start_date": "2017-09-08",
            "end_date": "2017-09-14"
        },
        "icon": [
            "icon_01_01",
            "icon_02_01"
        ],
        "price_content": "Sample Content",
        "buy_limit_by_product": "T",
        "buy_limit_type": "F",
        "buy_group_list": [
            8,
            9
        ],
        "buy_member_id_list": [
            "sampleid",
            "testid"
        ],
        "repurchase_restriction": "F",
        "single_purchase_restriction": "F",
        "buy_unit_type": "O",
        "buy_unit": 1,
        "order_quantity_limit_type": "O",
        "minimum_quantity": 1,
        "maximum_quantity": 0,
        "points_by_product": "T",
        "points_setting_by_payment": "C",
        "points_amount": [
            {
                "payment_method": "cash",
                "points_rate": "100.00",
                "points_unit_by_payment": "W"
            },
            {
                "payment_method": "mileage",
                "points_rate": "10.00",
                "points_unit_by_payment": "P"
            }
        ],
        "except_member_points": "F",
        "product_volume": {
            "use_product_volume": "T",
            "product_width": 3,
            "product_height": 5.5,
            "product_length": 7
        },
        "description": "Sample Description.",
        "mobile_description": "Sample Mobile Description.",
        "summary_description": "This is Product Summary.",
        "simple_description": "This is Product Description.",
        "payment_info": "Sample payment info. You have to Pay.",
        "shipping_info": "Sample shipping info. You have to ship.",
        "exchange_info": "Sample exchange info. You have to exchange.",
        "service_info": "Sample service info. You have to service.",
        "hscode": "4303101990",
        "country_hscode": {
            "JPN": "430310011",
            "CHN": "43031020"
        },
        "relational_product": [
            {
                "product_no": 9,
                "interrelated": "T"
            },
            {
                "product_no": 10,
                "interrelated": "F"
            }
        ],
        "shipping_scope": "A",
        "shipping_fee_by_product": "T",
        "shipping_method": "01",
        "shipping_period": {
            "minimum": 4,
            "maximum": 10
        },
        "shipping_area": "All around world",
        "shipping_fee_type": "D",
        "shipping_rates": [
            {
                "shipping_rates_min": "2000.00",
                "shipping_rates_max": "4000.00",
                "shipping_fee": "5000.00"
            },
            {
                "shipping_rates_min": "4000.00",
                "shipping_rates_max": "6000.00",
                "shipping_fee": "2500.00"
            }
        ],
        "product_material": "Aluminum",
        "translate_product_material": "F",
        "english_product_material": "Aluminum",
        "cloth_fabric": "knit",
        "classification_code": "C000000A",
        "additional_price": "1100.00",
        "margin_rate": "10.00",
        "tax_type": "A",
        "tax_rate": 10,
        "prepaid_shipping_fee": "P",
        "clearance_category_code": "ACAB0000",
        "product_shipping_type": "D",
        "origin_classification": "F",
        "origin_place_no": 1798,
        "made_in_code": "KR",
        "translated_additional_description": "This is a translated additional description of product.",
        "additional_image": [
            "201810/a2803c44ee8299486ff19be239cef7d0.jpg",
            "201810/e1ab68969d69287a828438c7684b14c4.jpg"
        ],
        "additional_information": [
            {
                "key": "custom_option1",
                "value": "Additional Information 1"
            },
            {
                "key": "custom_option2",
                "value": "Additional Information 2"
            }
        ],
        "exposure_limit_type": "M",
        "exposure_group_list": [
            8,
            9
        ]
    }
}';
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://{mallid}.cafe24api.com/api/v2/admin/products/7',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer {access_token}',
    'Content-Type: application/json',
    'X-Cafe24-Api-Version: {version}'
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
if ($err) {
  echo 'cURL Error #:' . $err;
} else {
  echo $response;
}