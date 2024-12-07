<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case PENDING = 'pending'; //The order has been received but payment has not been confirmed yet.
    case PROCESSING = 'processing'; //The order is confirmed, and the items are being prepared for shipment or digital goods are being processed.
    case SHIPPED = 'shipped'; //The items have been dispatched for delivery to the customer.
    case DELIVERED = 'delivered'; //The items have been successfully delivered to the customer.
    case CANCELLED = 'cancelled'; //The order has been cancelled either by the customer or the merchant.
}
