<?php

it('renders the terms of service page', function () {
    $response = $this->get('/terms');
    $response->assertStatus(200);
    $response->assertSee('Terms of Service');
    $response->assertSee('Independent Contractor');
    $response->assertSee('ShiftReady');
});
