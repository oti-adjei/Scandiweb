<?php
class ProductController
{
    private static $createSchema = [
        "productType" => [
            "required" => [],
            "oneOf" => [
                "Book" => ["sku", "name", "price", "type", "weight"],
                "DVD" => ["sku", "name", "price", "type", "size"],
                "Furniture" => ["sku", "name", "price", "type", "height",  "width", "length"],
            ],
        ],
        "sku" => [
            "required" => [],
            "string" => [],
        ],
        "name" => [
            "required" => [],
            "string" => [],
        ],
        "price" => [
            "required" => [],
            "number" => [],
        ],
        "weight" => [
            "requiredIf" => ["Book"],
            "number" => [],
        ],
        "size" => [
            "requiredIf" => ["DVD"],
            "number" => [],
        ],
        "height" => [
            "requiredIf" => ["Furniture"],
            "number" => [],
        ],
        "width" => [
            "requiredIf" => ["Furniture"],
            "number" => [],
        ],
        "length" => [
            "requiredIf" => ["Furniture"],
            "number" => [],
        ],
    ];

    private static $deleteProductSchema = [
        "skus" => [
            "required" => [],
            "arrayOf" => ["is_string"],
        ]
    ];
}
