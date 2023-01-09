import React, {useEffect, useState} from 'react';
import ReactDOM, {render} from 'react-dom';
class MyComponent extends React.Component {
    state = {
        data: null,
    };

    componentDidMount() {
        fetch('/product')
            .then(response => response.json())
            .then(data => this.setState({ data }));
    }

    render() {
        const { data } = this.state;

        if (!data) {
            return <div>Loading...</div>;
        }

        return (
            <div className="stock-container">
                {data.map((data, key) => {
                    return (
                        <div key={key}>
                            {data.name +
                                " , " +
                                data.type }
                        </div>
                    );
                })}
            </div>
        );
    }
}

export default MyComponent;

ReactDOM.render(<MyComponent />, document.getElementById('app'));
