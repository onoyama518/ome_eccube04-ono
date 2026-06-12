<?php

namespace Plugin\ContactManagement42;

final class PluginEvents
{
    // searchCustomer
    const ADMIN_CONTACT_EDIT_SEARCH_CUSTOMER_INITIALIZE = 'admin.contact.edit.search.customer.initialize';
    const ADMIN_CONTACT_EDIT_SEARCH_CUSTOMER_SEARCH = 'admin.contact.edit.search.customer.search';
    const ADMIN_CONTACT_EDIT_SEARCH_CUSTOMER_COMPLETE = 'admin.contact.edit.search.customer.complete';

    // searchCustomerById
    const ADMIN_CONTACT_EDIT_SEARCH_CUSTOMER_BY_ID_INITIALIZE = 'admin.contact.edit.search.customer.by.id.initialize';
    const ADMIN_CONTACT_EDIT_SEARCH_CUSTOMER_BY_ID_COMPLETE = 'admin.contact.edit.search.customer.by.id.complete';

}
