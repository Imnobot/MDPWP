jQuery(document).ready(function($) {

    "use strict"

    const { __ } = wp.i18n;
    const { registerBlockType } = wp.blocks;
    const el = wp.element.createElement;

    var IconBlock = function(e) {
        return wp.element.createElement("svg", {
            xmlns: "http://www.w3.org/2000/svg",
            "xmlns:xlink": "http://www.w3.org/1999/xlink",
            width: "20",
            height: "20",
            viewBox: "0 0 512 512",
            class: "dashicon aptean-block-icon"
        }, [wp.element.createElement("path", {
            id: "a",
            d: "M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm115.7 272l-176 101c-15.8 8.8-35.7-2.5-35.7-21V152c0-18.4 19.8-29.8 35.7-21l176 107c16.4 9.2 16.4 32.9 0 42z"
        })])
    };

    var i,
    players = JSON.parse(mvp_block_data.players),
    playlists = JSON.parse(mvp_block_data.playlists),
    ads = JSON.parse(mvp_block_data.ads),
    playerArr = [{label:'Select player..', value:''}], 
    playlistArr = [{label:'Select playlist..', value:''}],
    adArr = [{label:'Select ad..', value:''}]

    for (i = 0; i < players.length; i++){
        playerArr.push({label:players[i].title +' - ID #'+players[i].id, value:players[i].id})
    }
    for (i = 0; i < playlists.length; i++){
        playlistArr.push({label:playlists[i].title +' - ID #'+playlists[i].id, value:playlists[i].id})
    }
    for (i = 0; i < ads.length; i++){
        adArr.push({label:ads[i].title +' - ID #'+ads[i].id, value:ads[i].id})
    } 

    class Button extends React.Component {
        render() {
            var e = document.location.origin + document.location.pathname.replace("post.php", "admin.php") + "?page=";
            return el("a", {
                href: e + this.props.href,
                target: "_blank",
                className: this.props.className
            }, this.props.text)
        }
    }

    registerBlockType( 'modern-video-player/block', {
        title: "Modern Video Player",
        description: "Powerful video player for your website",
        icon: {
            src: IconBlock
        },
        category: 'common',
        keywords: [
            __( 'Video player' ),
            __( 'Video' ),
        ],
        attributes: {
            player_id : {
                type: 'string',
            },
            playlist_id : {
                type: 'string',
            },
            ad_id : {
                type: 'string',
            }
        },
        edit({attributes, setAttributes, className, focus, id}) {
            //console.log(attributes)

            function onChangePlayerId(v) {
                setAttributes( {player_id: v} );
            }

            function onChangePlaylistId(v) {
                setAttributes( {playlist_id: v} );
            }

            function onChangeAdId(v) {
                setAttributes( {ad_id: v} );
            }

            return [

                    el(
                        'div',
                        { className: 'aptean-block-container'},
                        el(IconBlock, {}), 
                        el("span", {}, "Modern Video Player")
                    ),

                    el( wp.element.Fragment, {},
                        el( wp.blockEditor.InspectorControls, {},
                            el( wp.components.PanelBody, { title: 'Select source', initialOpen: true },
             
                                playerArr.length == 1 ? 

                                    el(Button, {
                                        href: "mvp_player_manager&action=add_player",
                                        className: "components-button is-button is-default is-large aptean-block-panel-button",
                                        text: __("Create new player")
                                    })

                                : el(
                                    wp.components.SelectControl,
                                    {
                                        label: 'Select player',
                                        value: attributes.player_id,
                                        options: playerArr,
                                        onChange: onChangePlayerId,
                                    }
                                ),

                                playlistArr.length == 1 ? 

                                    el(Button, {
                                        href: "mvp_playlist_manager&action=add_playlist",
                                        className: "components-button is-button is-default is-large aptean-block-panel-button",
                                        text: __("Create new playlist")
                                    })

                                : el(
                                    wp.components.SelectControl,
                                    {
                                        label: 'Select playlist',
                                        value: attributes.playlist_id,
                                        options: playlistArr,
                                        onChange: onChangePlaylistId
                                    }
                                ),

                                adArr.length > 1 && el(
                                    wp.components.SelectControl,
                                    {
                                        label: 'Select ad',
                                        value: attributes.ad_id,
                                        options: adArr,
                                        onChange: onChangeAdId
                                    }
                                ),

                                
                            ),
             
                        ),

                    ), 
               
                ]


        },
        save(props) {

            var attributes = props.attributes, shortcode = '';

            if(attributes.player_id !== 'undefined' && attributes.playlist_id !== 'undefined'){
                shortcode += '[apmvp player_id="' + attributes.player_id + '" playlist_id="' + attributes.playlist_id + '"';
            }
            if(attributes.ad_id !== 'undefined')shortcode += ' ad_id="' + attributes.ad_id + '"';

            shortcode += ']';

            return shortcode;

        },
    } );


});