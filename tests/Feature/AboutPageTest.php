<?php

it('renders the about page', function () {
    $response = $this->get('/about');
    $response->assertOk();
    $response->assertSee('ShiftReady');
    $response->assertSee('Michael Wales');
    $response->assertSee('Veteran');
    $response->assertSee('San Antonio');
});
