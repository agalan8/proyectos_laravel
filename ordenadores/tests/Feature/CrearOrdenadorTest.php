<?php

use App\Models\Aula;
use App\Models\Ordenador;
use App\Models\User;

test('Crear ordenador sin middleware', function () {

    // Crear un usuario cualquiera, no necesariamente admin
    $usuario = User::factory()->create([
        'name' => 'admin'  // Usuario cualquiera
    ]);

    // Crear un aula para asociar al ordenador
    $aula = Aula::factory()->create();

    // Actuar como el usuario creado y hacer una solicitud POST para crear el ordenador
    $response = $this->actingAs($usuario)
                     ->from('/ordenadores/create')
                     ->post('/ordenadores', [
                        'marca' => 'Marca 1',
                        'modelo' => 'Modelo 1',
                        'aula_id' => $aula->id,
                     ]);

    // Verificar que el ordenador fue creado y que el usuario es redirigido al "show" del nuevo ordenador
    $ordenador = Ordenador::first();  // Obtener el primer ordenador creado
    $response->assertRedirect(route('ordenadores.show', $ordenador->id));  // Verificar que redirige al show del ordenador

    // Verificar que el ordenador fue creado correctamente en la base de datos
    $this->assertDatabaseHas('ordenadores', [
        'marca' => 'Marca 1',
        'modelo' => 'Modelo 1',
        'aula_id' => $aula->id,
    ]);
});

test('Solo el admin puede crear un ordenador', function () {

    // Usuario admin
    $admin = User::factory()->create([
        'name' => 'admin'  // Usuario con nombre admin
    ]);

    // Usuario no admin
    $usuario = User::factory()->create([
        'name' => 'manolo'  // Usuario no admin
    ]);

    // Crear un aula para asociar al ordenador
    $aula = Aula::factory()->create();

    // Verificar que el usuario admin pueda crear el ordenador
    $responseAdmin = $this->actingAs($admin)
                          ->from('/ordenadores/create')
                          ->post('/ordenadores', [
                              'marca' => 'Marca 1',
                              'modelo' => 'Modelo 1',
                              'aula_id' => $aula->id,
                          ]);

    // Verificar que el usuario admin es redirigido al show del nuevo ordenador
    $ordenador = Ordenador::first();  // Obtener el primer ordenador creado
    $responseAdmin->assertRedirect(route('ordenadores.show', $ordenador->id));  // Verificar la redirección

    // Verificar que el ordenador fue creado en la base de datos
    $this->assertDatabaseHas('ordenadores', [
        'marca' => 'Marca 1',
        'modelo' => 'Modelo 1',
        'aula_id' => $aula->id,
    ]);

    // Verificar que un usuario no admin no puede crear el ordenador
    $responseUsuario = $this->actingAs($usuario)
                            ->from('/ordenadores/create')
                            ->post('/ordenadores', [
                                'marca' => 'Marca 2',
                                'modelo' => 'Modelo 2',
                                'aula_id' => $aula->id,
                            ]);

    // Verificar que un usuario no admin recibe un 403 Forbidden
    $responseUsuario->assertStatus(403);
});

test('Eliminar un ordenador', function(){

    $usuario = User::factory()->create([
        'name' => 'admin'  // Usuario no admin
    ]);

    $ordenador = Ordenador::factory()->create();

    $response = $this
        ->actingAs($usuario)
        ->delete('/ordenadores/'.$ordenador->id);

    $this->assertAuthenticated();
    $response->assertSessionHasNoErrors();
    $response->assertRedirect('/ordenadores');
});
