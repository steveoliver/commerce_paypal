<?php

/**
 * @file
 * Documents hooks provided by the PayPal modules.
 */


/**
 * Lets modules perform additional processing on validated IPNs.
 *
 * When the PayPal module receives an Instant Payment Notification (IPN) from
 * PayPal, it performs some basic validation, allows the payment method detected
 * in the IPN URL to perform additional validation and processing, and finally
 * invokes this hook to allow other modules to react to the IPN. If the IPN
 * fails either the basic or payment method specific validation, it will not be
 * processed and therefore will not result in this hook's invocation.
 *
 * When a module implements this hook, it is important to take the values of the
 * arguments into consideration before acting. For example, it is possible that
 * the Order and/or the Transaction parameters are FALSE, meaning the IPN was
 * sent for a transaction that Commerce knows nothing about.
 *
 * Additionally, the IPN array may not have the ipn_id set, meaning that the IPN
 * passed validation but could not be processed by the payment method module. In
 * this case, you would not want to take any permanent, non-repeatable action,
 * as it is possible the store owner will need to resubmit the IPN until it
 * actually processes properly.
 *
 * Finally, the IPN array may not have the transaction_id set, meaning the IPN
 * either did not result in the creation of a payment transaction intentionally
 * or failed to process properly. In this case, you may not want to take action
 * that would normally result in the update of an existing payment transaction,
 * though it still might be ok to take action that would have resulted in the
 * creation of an additional transaction.
 *
 * While IPNs generally have a unique txn_id, in the case of voided
 * authorizations, the void notification will have the same txn_id as the
 * authorization notification. Some IPNs are related to others through the
 * parent_txn_id and auth_id values. See the PayPal WPS IPN process callback for
 * an example of how to interact with these values for prior authorization
 * captures and refunds.
 *
 * @param $order
 *   The order that initiated the payment associated with the IPN.
 * @param $payment_method
 *   The payment method instance used to create the payment and perform initial
 *   processing on the IPN.
 * @param $ipn
 *   The IPN array received from PayPal after it has been saved, including the
 *   additional ipn_id, order_id, and transaction_id values.
 *
 * @see commerce_paypal_wps_paypal_ipn_process()
 */
function hook_commerce_paypal_ipn_process($order, $payment_method, $ipn) {
  // No example.
}
