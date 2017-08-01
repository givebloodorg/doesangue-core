<?php

namespace DoeSangue\Repositories;
use DoeSangue\Models\Invite;

class Invites
{

    /**
     * Returns all Invites from Invite model.
     *
     * @return void
     */
    public function all()
    {
        return Invite::all();
    }

    /**
     * Returns the Invite by specified ID.
     *
     * @return void
     */
    public function findById($id)
    {
        return Invite::whereId($id)->get();
    }
}
